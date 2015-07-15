@extends("crud.layout-form")

@section("form")



<div class="form-group @if ($errors->has('year')) has-error @endif">

 {{ Form::label("text", "Año") }}
   
      {{ Form::text("year",$record->year,["class" => "form-control","placeholder"=>"Año"]); }}
    
 <span class="help-block">{{ $errors->first('year') }}</span>
</div>

<div class="form-group @if ($errors->has('titulo')) has-error @endif">

 {{ Form::label("text", "Titulo") }}
   
      {{ Form::text("titulo",$record->titulo,["class" => "form-control","placeholder"=>"Titulo"]); }}
    
 <span class="help-block">{{ $errors->first('titulo') }}</span>
</div>

<div class="form-group @if ($errors->has('descripcion')) has-error @endif">

 {{ Form::label("textarea", "Descripcion") }}
   
      {{ Form::textarea("descripcion", $record->descripcion,["class" => "form-control","placeholder"=>"Descripcion"]) }}
    
 <span class="help-block">{{ $errors->first('descripcion') }}</span>
</div>

<div class="form-group @if ($errors->has('id_categorias')) has-error @endif">

 {{ Form::label("remotecombo", "Categoría") }}
   
      {{ Form::remotecombo("id_categorias",$record->id_categorias,["table"=>$model,"class" => "form-control","placeholder"=>"Categoría"] ); }}
    
 <span class="help-block">{{ $errors->first('id_categorias') }}</span>
</div>

<div class="form-group @if ($errors->has('parent')) has-error @endif">
	<?php $parents = [ 0 => 'Ninguno' ]; $parents[] = Muros::where( 'parent', 0 )->lists( 'titulo', 'id_muros' ); ?>
	{{ Form::label("select", "Padre") }}
	{{ Form::select("parent",$parents,$record->parent,["class" => "form-control","placeholder"=>"Padre"]); }}
 	<span class="help-block">{{ $errors->first('parent') }}</span>
</div>

<div class="form-group @if ($errors->has('imagen')) has-error @endif">
	{{ Form::label("image", "Imagen") }}
	{{ Form::filepicker("imagen",$record->imagen) }}
 	<span class="help-block">{{ $errors->first('imagen') }}</span>
</div>

<div class="form-group @if ($errors->has('orden')) has-error @endif">

 {{ Form::label("text", "Orden") }}
   
      {{ Form::text("orden",$record->orden,["class" => "form-control","placeholder"=>"Orden"]); }}
    
 <span class="help-block">{{ $errors->first('orden') }}</span>
</div>

     

@stop


