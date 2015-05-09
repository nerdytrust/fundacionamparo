

@foreach ($columns as $column)
    @if (!$column->is_primary)
     <div class="form-group @if ($errors->has($column->name)) has-error @endif">

         {{ Form::label($column->input, $column->label) }}
           
         @if ($column->name == "password") 
            {{ Form::password($column->name,array('class' => 'form-control','placeholder'=>$column->label)); }}
         @elseif ($column->is_foreign_key)
         <?php
            $fkmodel = new $column->model;
            $rmodel = $fkmodel::all();

            foreach ($rmodel as $rrecord) 
                $column->data[$rrecord->{$fkmodel->getKeyName()}] = $rrecord->{$fkmodel->getName()};
            
        ?>
            {{ Form::select($column->name, [$column->data],$record->{$column->name}); }}
         @elseif ($column->input == "select")
            {{ Form::select($column->name, [$column->data],$record->{$column->name},array('class' => 'form-control','placeholder'=>$column->label,'required'=>'true')); }}
         @elseif ($column->input == "date")
            <?php

                if(isset($record->{$column->name}))
                {
                   // $record->{$column->name} = DateTime::createFromFormat('Y-m-d', $record->{$column->name})->format('Y-m-d H:i:s');
                }
                
            ?>
            <div class="input-group date">
              <input type="text" class="form-control" value="@if(isset($record->{$column->name})) {{ $record->{$column->name} }} @endif" placeholder="{{ $column->label }}" required="true" name="{{ $column->name }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
            
         @elseif ($column->input != "number"  )
            {{ call_user_func("Form::".$column->input,$column->name,$record->{$column->name},array('class' => 'form-control','placeholder'=>$column->label,'required'=>'true')) }}
         @else
            {{ call_user_func("Form::".$column->input,$column->name,"",$record->{$column->name},array('class' => 'form-control')) }}
         @endif
<!--
array('class' => 'form-control','placeholder'=>$column->label,'required'=>'true')
number
-->
         <span class="help-block">{{ $errors->first($column->name) }}</span>
     </div>
    @endif 



