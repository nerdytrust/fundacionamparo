@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_voluntarios->input, $columns->id_voluntarios->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_voluntarios,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_estados->input, $columns->id_estados->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_estados,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_ciudades->input, $columns->id_ciudades->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_ciudades,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_causas->input, $columns->id_causas->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_causas,$record,$fk_column) }}
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
		{{ Form::label($columns->apellidos->input, $columns->apellidos->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->apellidos,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->email->input, $columns->email->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->email,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->telefono->input, $columns->telefono->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->telefono,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->nacimiento->input, $columns->nacimiento->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->nacimiento,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_sexos->input, $columns->id_sexos->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_sexos,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_disponibilidades->input, $columns->id_disponibilidades->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_disponibilidades,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_horarios->input, $columns->id_horarios->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_horarios,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_estudiantes->input, $columns->id_estudiantes->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_estudiantes,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_tipo_ayudas->input, $columns->id_tipo_ayudas->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_tipo_ayudas,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->terminos->input, $columns->terminos->label) }}
	</div>
	<div class="col-xs-10 ">
		@if ( $record->terminos == 1 )
			Aceptados
		@else
			No aceptados
		@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->aprobacion->input, $columns->aprobacion->label) }}
	</div>
	<div class="col-xs-10 ">
		@if ( $record->aprobacion == 1 )
			Aprobado
		@else
			Pendiente
		@endif
	</div>
</div>

@stop



