@foreach ($columns as $column)
    @if (!$column->is_primary)
     <div class="form-group @if ($errors->has($column->name)) has-error @endif">

        @if($column->input !="hidden")
         {{ Form::label($column->input, $column->label) }}
        @endif


         @if($column->name == "password") 
            {{ Form::password($column->name,['class' => 'form-control','placeholder'=>$column->label]); }}
         @elseif ($column->input == "remotecombo")

            {{ Form::remotecombo($column->name,$record->{$column->name},['table'=>$model,'class' => 'form-control','placeholder'=>$column->label] ); }}

         @elseif ( $column->input == "select" or $column->input == "combo" )
            {{ Form::select( $column->name, [$record] , $record->{$column->name}, [ 'class' => 'form-control', 'placeholder' => $column->label ], $column->data ); }}

         @elseif ($column->input == "date" or $column->input == "datetime" or $column->input == "time"  )

            {{ Form::datepicker($column->name,$record->{$column->name},['class'=>'form-control','placeholder'=>$column->label],$column->input) }}

        @elseif ($column->input == "audio" or  $column->input == "image" or  $column->input == "video" or  $column->input == "document" or  $column->input == "zip" or  $column->input == "file")

            {{ Form::filepicker($column->name,$record->{$column->name}) }}

         @elseif ( $column->input == "money" or $column->input =="currency")
         
           {{ Form::currency($column->name,$record->{$column->name},['placeholder'=>$column->label,'class' => 'form-control']); }}

         @elseif ($column->input == "number")
         
            {{ Form::number($column->name,$record->{$column->name},['placeholder'=>$column->label,'class' => 'form-control']); }}
  
         @elseif  ($column->input == "toggle") 

            {{ Form::toggle($column->name, $record->{$column->name},[],$column->data); }}
            
         @elseif  ($column->input == "html" || $column->input == "editor") 

            {{ Form::editor($column->name, $record->{$column->name},[]); }}

         @elseif  ($column->input == "radios" || $column->input == "radiogroup") 

            {{ Form::radiogroup($column->name,$record->{$column->name},[],$column->data); }}

         @elseif ($column->input != "number")
            {{ call_user_func("Form::".$column->input,$column->name,$record->{$column->name},['class' => 'form-control','placeholder'=>$column->label]) }}
         @else
            {{ call_user_func("Form::".$column->input,$column->name,"",$record->{$column->name},['class' => 'form-control']) }}
         @endif



         <span class="help-block">{{ $errors->first($column->name) }}</span>
     </div>
    @endif 

@endforeach
 


