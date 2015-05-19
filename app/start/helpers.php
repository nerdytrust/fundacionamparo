<?php

function toModel($model)
{
    $model     = strtolower($model);
    $model     = str_replace(["id_","_id"], "", $model);
    $model     = ucfirst(camel_case($model));
    //$model     = str_singular($model);
    

    return $model;
}


function getCurrentAction(){
    
    $action = Route::current()->getActionName();
    $action = explode("@", $action);
    return $action = $action[count($action)-1];
}

function getFKColumn($column = NULL,$default_record = [],$fk_column = [],$first = true)
{

    if(isset($default_record->{$column."_record"}))
    {

        if($first)
            $record = $default_record->{$column."_record"}()->first();
        else
            $record = $default_record->{$column."_record"};

        if(!$record)
            return "---";
    }else
    {
        if(isset($default_record->{$column}))
            return $default_record->{$column};
        elseif(!is_array($default_record))
            return "---";

    }
        
    return getColumnsFK($column,$record,$fk_column);

}


function getColumnsFK($column,$record,$fk_column)
{

    $fk_column_name = "";

    if(array_key_exists($column,$fk_column) and is_array($fk_column[$column]))
    {

        foreach ($fk_column[$column] as $fk_column_record) 
        {
            if(isset($record->{$fk_column_record}))
                $fk_column_name.= $record->{$fk_column_record}." ";
        }

    }else if(array_key_exists($column,$fk_column))
        $fk_column_name = $record->{$fk_column[$column]};
    else
        $fk_column_name = $default_record->{$column};
    
        
            
    return $fk_column_name;
}


function strip_out_subdomain($domain)  {     
    $only_my_domain = preg_replace("/^(.*?)\.(.*)$/","$2",$domain);      
    return $only_my_domain;  
}

/**
 * Groups an array by a given key. Any additional keys will be used for grouping
 * the next set of sub-arrays.
 *
 * @author Jake Zatecky
 *
 * @param array $arr The array to have grouping performed on.
 * @param mixed $key The key to group or split by.
 *
 * @return array
 */
function array_group_by($arr, $key)
{
    if (!is_array($arr)) {
        trigger_error("array_group_by(): The first argument should be an array", E_USER_ERROR);
    }
    if (!is_string($key) && !is_int($key) && !is_float($key)) {
        trigger_error("array_group_by(): The key should be a string or an integer", E_USER_ERROR);
    }

    // Load the new array, splitting by the target key
    $grouped = array();
    foreach ($arr as $value) {
        $grouped[$value[$key]][] = $value;
    }

    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
        $args = func_get_args();

        foreach ($grouped as $key => $value) {
            $parms = array_merge(array($value), array_slice($args, 2, func_num_args()));
            $grouped[$key] = call_user_func_array("array_group_by", $parms);
        }
    }

    return $grouped;
}

function in_array_field($needle, $needle_field, $haystack, $strict = false) { 
    if ($strict) { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field === $needle) 
                return $item; 
    } 
    else { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field == $needle) 
                return $item; 
    } 
    return false; 
} 


function in_array_match($regex, $array) {
    if (!is_array($array))
        trigger_error('Argument 2 must be array');
    foreach ($array as $v) {
        $match = preg_match($regex, $v);
        if ($match === 1) {
            return true;
        }
    }
    return false;
}


function _in_array_match($regex, $array) {
    $return = [];

    if (!is_array($array))
        trigger_error('Argument 2 must be array');
    foreach ($array as $v) {
        $match = preg_match($regex, $v);
        if ($match === 1) {
            $return[] = $v;
        }
    }
    return $return;
}


function str_normal($string)
{
    $string = snake_case($string);

    return ucfirst(str_replace('_',' ', $string));
}

?>