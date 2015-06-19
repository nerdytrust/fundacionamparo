<?php $disable_header = 1; $disable_footer = 1; ?>
{{ Form::hidden( 'city', NULL ) }}
<span>
	País<br/>
	<select name="country" id="beca_pais">
		<option value="0">Selecciona un país</option>
		@foreach ( $paises as $pais )
			<option value="{{ $pais->id_paises }}">{{ $pais->name }}</option>
		@endforeach											
	</select>
</span>
<span>
	Estado<br/>
	<select name="state" id="beca_estado">
		<option value="0">Selecciona un Estado</option>
	</select>
</span>
<span>
	Ciudad<br/>
	<select name="city" id="beca_ciudad">
		<option value="0">Selecciona una Ciudad</option>
	</select>
</span>
<script type="text/javascript" src="{{ asset( 'js/public/combos.scripts.js' ) }}"></script>