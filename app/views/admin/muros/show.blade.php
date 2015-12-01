@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_muros->input, $columns->id_muros->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_muros,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->year->input, $columns->year->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->year,$record,$fk_column) }}
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
		{{ Form::label($columns->descripcion->input, $columns->descripcion->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->descripcion,$record,$fk_column) }}
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
		{{ Form::label($columns->imagen->input, $columns->imagen->label) }}
	</div>
	<div class="col-xs-10 ">
		<img src="{{ asset( 'path_image/'  . $record->imagen . '/' . '450x200' ) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->me_gusta->input, $columns->me_gusta->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->me_gusta,$record,$fk_column) }}
	</div>
</div>

@stop