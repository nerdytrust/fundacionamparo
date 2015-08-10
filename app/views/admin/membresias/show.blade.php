@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_membresias->input, $columns->id_membresias->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_membresias,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->nombre->input, $columns->nombre->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->nombre,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->resena->input, $columns->resena->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->resena,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->url->input, $columns->url->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->url,$record,$fk_column) }}
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
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->logo->input, $columns->logo->label) }}
	</div>
	<div class="col-xs-10 ">
		<img src="{{ asset( 'path_image/'  . $record->logo . '/' . '100x100' ) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->orden->input, $columns->orden->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->orden,$record,$fk_column) }}
	</div>
</div>

@stop



