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
            {{ Form::select($column->name, [$column->data],$record->{$column->name},array('class' => 'form-control','placeholder'=>$column->label)); }}
         @elseif ($column->input == "date" or $column->input == "datetime" or $column->input == "time"  )

            <div class="input-group">
              <input type="text" class="form-control {{ $column->input }}" value="@if(isset($record->{$column->name})) {{ $record->{$column->name} }} @endif" placeholder="{{ $column->label }}" name="{{ $column->name }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>

        @elseif ($column->input == "audio" or  $column->input == "image" or  $column->input == "video" or  $column->input == "document" or  $column->input == "zip" or  $column->input == "file")

            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">{{ trans('crud.select_file') }}</span><span class="fileinput-exists">{{ trans('crud.change') }}</span>
                <input type="file" name="{{ $column->name }}">
              </span>
              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('crud.remove') }}</a>
            </div>


            
         @elseif ( $column->input == "money" or $column->input =="currency")
         
            <div class="input-group"> 
                <span class="input-group-addon">$</span>
                <input type="number" min="0" step="0.01" name="{{ $column->name }}" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency"/>
            </div>

         @elseif ($column->input == "number")
         
  
            <input type="number" min="0" step="1" name="{{ $column->name }}" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency"  />
  

         @elseif ($column->input != "number")
            {{ call_user_func("Form::".$column->input,$column->name,$record->{$column->name},array('class' => 'form-control','placeholder'=>$column->label)) }}
         @else
            {{ call_user_func("Form::".$column->input,$column->name,"",$record->{$column->name},array('class' => 'form-control')) }}
         @endif



         <span class="help-block">{{ $errors->first($column->name) }}</span>
     </div>
    @endif 

@endforeach
 


