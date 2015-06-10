
<?php

if(Input::has("is-advance-search"))
    $class = 'padding-md advance-search';
else
    $class = 'padding-md hidden advance-search';
?>

{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'), 'method' => 'GET','class'  => $class,'role' =>'search')) }}

    
@foreach ($advance_search as $column)

     <div class="form-group @if ($errors->has($column->name)) has-error @endif">

        @if($column->input !="hidden")
         <div class="col-md-2">
            {{ Form::label($column->input, $column->label) }}

         </div>   
         
        @endif

        <div class="col-md-10">


         @if($column->name == "password") 
            {{ Form::password($column->name,['class' => 'form-control','placeholder'=>$column->label]); }}
         @elseif ($column->input == "remotecombo")

            {{ Form::remotecombo($column->name,Input::get($column->name),['table'=>$model,'class' => 'form-control','placeholder'=>$column->label] ); }}

         @elseif ($column->input == "select" or $column->input == "combo")

            {{ Form::combo($column->name,Input::get($column->name),['class' => 'form-control','placeholder'=>$column->label],$column->data); }}

         @elseif ($column->input == "date" or $column->input == "datetime" or $column->input == "time"  )

            {{ Form::datepicker($column->name,Input::get($column->name),['class'=>'form-control','placeholder'=>$column->label],$column->input) }}

        @elseif ($column->input == "audio" or  $column->input == "image" or  $column->input == "video" or  $column->input == "document" or  $column->input == "zip" or  $column->input == "file")

            {{ Form::filepicker($column->name,'') }}

         @elseif ( $column->input == "money" or $column->input =="currency")
         
           {{ Form::currency($column->name,Input::get($column->name),['placeholder'=>$column->label,'class' => 'form-control']); }}

         @elseif ($column->input == "number")
         
            {{ Form::number($column->name,Input::get($column->name),['placeholder'=>$column->label,'class' => 'form-control']); }}
  
         @elseif  ($column->input == "toggle") 

            {{ Form::toggle($column->name, '',[],$column->data); }}
            
         @elseif  ($column->input == "html" || $column->input == "editor") 

            {{ Form::text($column->name, Input::get($column->name),['placeholder'=>$column->label,'class' => 'form-control']); }}

         @elseif  ($column->input == "radios" || $column->input == "radiogroup") 

            {{ Form::radiogroup($column->name,Input::get($column->name),[],$column->data); }}

         @elseif ($column->input != "number")
            {{ call_user_func("Form::".$column->input,$column->name,Input::get($column->name),['class' => 'form-control','placeholder'=>$column->label]) }}
         @else
            {{ call_user_func("Form::".$column->input,$column->name,"",Input::get($column->name),['class' => 'form-control']) }}
         @endif



         <span class="help-block">{{ $errors->first($column->name) }}</span>

        </div>
     </div>

@endforeach

{{ Form::hidden('is-advance-search', 'true'); }}
 
<div class="pull-right padding-bottom-md">
 {{ Form::submit(trans('crud.search'), array('class' => 'btn btn-lg btn-success')) }}
 <a href="{{ getenv('APP_ADMIN_PREFIX').'/'.$model.'/' }}" class="btn btn-lg btn-default">{{ trans('crud.cancel') }}</a>
</div>

{{ Form::close() }}
