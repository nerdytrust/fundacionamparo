@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_donaciones->input, $columns->id_donaciones->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_donaciones,$record,$fk_column) }}
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
		{{ Form::label($columns->id_causas->input, $columns->id_causas->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_causas,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->monto_donacion->input, $columns->monto_donacion->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->monto_donacion,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->reference_id->input, $columns->reference_id->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->reference_id,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->transaction_id->input, $columns->transaction_id->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->transaction_id,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->transaction_brand->input, $columns->transaction_brand->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->transaction_brand,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->transaction_type->input, $columns->transaction_type->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->transaction_type,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->status->input, $columns->status->label) }}
	</div>
	<div class="col-xs-10 ">
		@if ( $record->status == 1 )
			Aceptada
		@else
			Pendiente
		@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->mostrar_perfil->input, $columns->mostrar_perfil->label) }}
	</div>
	<div class="col-xs-10 ">
		@if ( $record->mostrar_perfil == 1 )
			Si
		@else
			No
		@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->created_at->input, $columns->created_at->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->created_at,$record,$fk_column) }}
	</div>
</div>

@stop



