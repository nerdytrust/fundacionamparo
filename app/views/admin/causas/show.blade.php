@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_causas->input, $columns->id_causas->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_causas,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->titulo->input, $columns->titulo->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->titulo,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->fecha->input, $columns->fecha->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->fecha,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->descripcion->input, $columns->descripcion->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->descripcion,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->meta->input, $columns->meta->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->meta,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->me_gusta_interno->input, $columns->me_gusta_interno->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->me_gusta_interno,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->imagen->input, $columns->imagen->label) }}
	</div>
	<div class="col-xs-10 ">
		<img src="{{ asset( 'path_image/'  . $record->imagen . '/' . '559x548' ) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_categorias->input, $columns->id_categorias->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_categorias,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_tipo_causas->input, $columns->id_tipo_causas->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_tipo_causas,$record,$fk_column) }}
	</div>
</div>

@stop



