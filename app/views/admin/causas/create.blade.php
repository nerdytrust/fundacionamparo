@extends("crud.layout-form")

@section("form")


<div class="row">
	<div class="col-lg-6">
		<div class="form-group @if ($errors->has('titulo')) has-error @endif">

		 {{ Form::label("text", "3rfgre") }}
		   
		      {{ Form::text("titulo",$record->titulo,["class" => "form-control","placeholder"=>"Titulo"]); }}
		    
		 <span class="help-block">{{ $errors->first('titulo') }}</span>
		</div>
	</div>

	<div class="col-lg-6">
			<div class="form-group @if ($errors->has('fecha')) has-error @endif">

			 {{ Form::label("date", "Fecha de Cierre") }}
			   
			      {{ Form::datepicker("fecha",$record->fecha,["class"=>"form-control","placeholder"=>"Fecha de Cierre"],"date") }}
			    
			 <span class="help-block">{{ $errors->first('fecha') }}</span>
			</div>
	</div>

</div>





<div class="form-group @if ($errors->has('descripcion')) has-error @endif">

 {{ Form::label("textarea", "Descripcion") }}
   
      {{ Form::textarea("descripcion", $record->descripcion,["class" => "form-control","placeholder"=>"Descripcion"]) }}
    
 <span class="help-block">{{ $errors->first('descripcion') }}</span>
</div>

<div class="form-group @if ($errors->has('meta')) has-error @endif">

 {{ Form::label("currency", "Meta") }}
   
      {{ Form::currency("meta",$record->meta,["class" => "form-control","placeholder"=>"Meta"]); }}
    
 <span class="help-block">{{ $errors->first('meta') }}</span>
</div>

<div class="form-group @if ($errors->has('orden')) has-error @endif">

 {{ Form::label("text", "Orden") }}
   
      {{ Form::text("orden",$record->orden,["class" => "form-control","placeholder"=>"Orden"]); }}
    
 <span class="help-block">{{ $errors->first('orden') }}</span>
</div>

<div class="form-group @if ($errors->has('imagen')) has-error @endif">

 {{ Form::label("image", "Imagen") }}
   
      {{ Form::filepicker("imagen",$record->imagen) }}
    
 <span class="help-block">{{ $errors->first('imagen') }}</span>
</div>

<div class="form-group @if ($errors->has('id_categorias')) has-error @endif">

 {{ Form::label("remotecombo", "Categoría") }}
   
      {{ Form::remotecombo("id_categorias",$record->id_categorias,["table"=>$model,"class" => "form-control","placeholder"=>"Categoría"] ); }}
    
 <span class="help-block">{{ $errors->first('id_categorias') }}</span>
</div>

<div class="form-group @if ($errors->has('id_tipo_causas')) has-error @endif">

 {{ Form::label("remotecombo", "Tipo de Causa") }}
   
      {{ Form::remotecombo("id_tipo_causas",$record->id_tipo_causas,["table"=>$model,"class" => "form-control","placeholder"=>"Tipo de Causa"] ); }}
    
 <span class="help-block">{{ $errors->first('id_tipo_causas') }}</span>
</div>

     

@stop


