@extends("crud.layout-show")

@section("form")
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_noticias->input, $columns->id_noticias->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_noticias,$record,$fk_column) }}
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
		{{ Form::label($columns->contenido->input, $columns->contenido->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->contenido,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->extracto->input, $columns->extracto->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->extracto,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->imagen->input, $columns->imagen->label) }}
	</div>
	<div class="col-xs-10 ">
		<img src="{{ asset( 'path_image/' . $record->imagen . '/' . '300x300' ) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->fecha_publicacion->input, $columns->fecha_publicacion->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->fecha_publicacion,$record,$fk_column) }}
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



