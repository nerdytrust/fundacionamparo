<?php $disable_header = 1; $disable_footer = 1; ?>
{{ Form::hidden( 'country', 142 ) }}
{{ Form::hidden( 'city', NULL ) }}
<span>
	Estado<br/>
	<select name="state" id="beca_estado">
		<option value="0">Selecciona un Estado</option>
		@foreach ( $estados as $estado )
			<option value="{{ $estado->id_estados }}">{{ $estado->name }}</option>
		@endforeach
	</select>
</span>
<span>
	Ciudad<br/>
	<select name="city" id="beca_ciudad">
		<option value="0">Selecciona una Ciudad</option>
	</select>
</span>
<script type="text/javascript" src="{{ asset( 'js/public/combos.scripts.js' ) }}"></script>