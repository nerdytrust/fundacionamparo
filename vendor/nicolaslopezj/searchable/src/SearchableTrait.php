<?php namespace Nicolaslopezj\Searchable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;
use Config;
use DB;
use Illuminate\Support\Str;

/**
 * Trait SearchableTrait
 * @package Nicolaslopezj\Searchable
 */
trait SearchableTrait
{
    /**
     * @var array
     */
    protected $search_bindings = [];

    /**
     * Creates the search scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @param float|null $threshold
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $search, $threshold = null)
    {
        $query->select($this->getTable() . '.*');
        $this->makeJoins($query);

        if ( ! $search)
        {
            return $query;
        }

        $words = explode(' ', $search);

        $selects = [];
        $this->search_bindings = [];
        $relevance_count = 0;



        foreach ($this->__getColumns() as $column => $relevance)
        {

            $relevance_count += $relevance;
            $queries = $this->getSearchQueriesForColumn($query, $column, $relevance, $words);
            foreach ($queries as $select)
            {
                $selects[] = $select;
            }
        }

        $this->addSelectsToQuery($query, $selects);
        $this->filterQueryWithRelevance($query, $selects, $threshold ?: ($relevance_count / 4));

        $this->makeGroupBy($query);

        $this->addBindingsToQuery($query, $this->search_bindings);

        return $query;
    }

    /**
     * Returns database driver Ex: mysql, pgsql, sqlite.
     *
     * @return array
     */
    protected function getDatabaseDriver() {
        $key = Config::get('database.default');
        return Config::get('database.connections.' . $key . '.driver');
    }

    /**
     * Returns the search columns.
     *
     * @return array
     */
    protected function __getColumns()
    {

        if (array_key_exists('columns', $this->searchable)) {
            return $this->searchable['columns'];
        } else {

            $columns = [];

            if(getCurrentAction() == "remoteCombo")
            {
                
                $model      = getCurrentModel();
                $model      = new $model;
                $fk_column  = $model->getCrud("fk_column");

                $column     = getLastAction();

                if(isset($fk_column[$column]))
                {
                    foreach ($fk_column[$column] as $fk)
                        $columns[$fk] = 10;
                }
                else
                    $columns[$column] = 10;



            }else
            {
                foreach ($this->getColumnsByView("index") as $column) {
                    if(!$column->is_foreign_key and !$column->is_primary and ( $column->type=="string" or $column->type=="text" ))
                        $columns[$column->name] = 10;
                }
            }



            return array_diff($columns, ["status","created_by","updated_by","created_at","updated_at"]);

        }
    }

    /**
     * Returns the table columns.
     *
     * @return array
     */
    public function getTableColumns()
    {
        return $this->searchable['table_columns'];
    }

    /**
     * Returns the tables that are to be joined.
     *
     * @return array
     */
    protected function getJoins()
    {
        return array_get($this->searchable, 'joins', []);
    }

    /**
     * Adds the sql joins to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     */
    protected function makeJoins(Builder $query)
    {
        foreach ($this->getJoins() as $table => $keys)
        {
            $query->leftJoin($table, $keys[0], '=', $keys[1]);
        }
    }

    /**
     * Makes the query not repeat the results.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     */
    protected function makeGroupBy(Builder $query)
    {
        $driver = $this->getDatabaseDriver();
        if ($driver == 'sqlsrv') {
            $columns = $this->getTableColumns();
        } else {
            $id = $this->getTable() . '.' .$this->primaryKey;
            $joins = array_keys(($this->getJoins()));

            foreach ($this->__getColumns() as $column => $relevance) {

                array_map(function($join) use ($column, $query){

                    if(Str::contains($column, $join)){
                        $query->groupBy("$column");
                    }

                }, $joins);

            }
        }
        $query->groupBy($id);
    }

    /**
     * Puts all the select clauses to the main query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $selects
     */
    protected function addSelectsToQuery(Builder $query, array $selects)
    {
        $selects = new Expression(implode(' + ', $selects) . ' as relevance');
        $query->addSelect($selects);
    }

    /**
     * Adds the relevance filter to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $selects
     * @param float $relevance_count
     */
    protected function filterQueryWithRelevance(Builder $query, array $selects, $relevance_count)
    {
        $comparator = $this->getDatabaseDriver() != 'mysql' ? implode(' + ', $selects) : 'relevance';
        $query->having($comparator, '>', $relevance_count);
        $query->orderBy('relevance', 'desc');

        // add bindings to postgres
    }

    /**
     * Returns the search queries for the specified column.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $column
     * @param float $relevance
     * @param array $words
     * @return array
     */
    protected function getSearchQueriesForColumn(Builder $query, $column, $relevance, array $words)
    {
        $like_comparator = $this->getDatabaseDriver() == 'pgsql' ? 'ILIKE' : 'LIKE';

        $queries = [];

        $queries[] = $this->getSearchQuery($query, $column, $relevance, $words, $like_comparator, 15);
        $queries[] = $this->getSearchQuery($query, $column, $relevance, $words, $like_comparator, 5, '', '%');
        $queries[] = $this->getSearchQuery($query, $column, $relevance, $words, $like_comparator, 1, '%', '%');

        return $queries;
    }

    /**
     * Returns the sql string for the given parameters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $column
     * @param string $relevance
     * @param array $words
     * @param string $compare
     * @param float $relevance_multiplier
     * @param string $pre_word
     * @param string $post_word
     * @return string
     */
    protected function getSearchQuery(Builder $query, $column, $relevance, array $words, $compare, $relevance_multiplier, $pre_word = '', $post_word = '')
    {
        $cases = [];

        foreach ($words as $word)
        {
            $cases[] = $this->getCaseCompare($column, $compare, $relevance * $relevance_multiplier);
            $this->search_bindings[] = $pre_word . $word . $post_word;
        }

        return implode(' + ', $cases);
    }

    /**
     * Returns the comparison string.
     *
     * @param string $column
     * @param string $compare
     * @param float $relevance
     * @return string
     */
    protected function getCaseCompare($column, $compare, $relevance) {
        $field = $column . " " . $compare . " ?";
        return '(case when ' . $field . ' then ' . $relevance . ' else 0 end)';
    }

    /**
     * Adds the bindings to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $bindings
     */
    protected function addBindingsToQuery(Builder $query, array $bindings) {
        $count = $this->getDatabaseDriver() != 'mysql' ? 2 : 1;
        for ($i = 0; $i < $count; $i++) {
            foreach($bindings as $binding) {
                $type = $i == 0 ? 'select' : 'having';
                $query->addBinding($binding, $type);
            }
        }
    }
}
