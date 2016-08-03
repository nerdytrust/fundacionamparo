<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")donar
	@stop
	@section("content")
		<div class="lightbox-h d" id="verde1">
			<div class="lightbox-h-cont donar" id="form_proccess_donation">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h"></button>
				<button onClick="history.back()" class="regresar">Regresar</button>
				<h1>donar</h1>
				<p>
					Tu ayuda es importante y </br>marca la diferencia para muchos.
				</p>
				<label for="" class="vol">
					<p>Escoge la causa que quieras apoyar</p>
					{{ Form::open( [ 'url' => 'nueva-donacion', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form', 'id' => 'form_nueva_donacion' ] ) }}
						{{ Form::hidden( 'mostrar_perfil', '1' ) }}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						<select name="causa_donar" id="">
							@if ( isset( $causas ) )
								@foreach ( $causas as $causa )
									<option value="{{ $causa->id_causas }}">{{ $causa->titulo }}</option>
								@endforeach
							@endif
						</select>
						<p>Ingresa el monto que deseas donar</p>
						<span class="op">
							{{ Form::text( 'monto', Input::old( 'monto'), [ 'placeholder' => '10.00', 'maxlength' => 8, 'required' => true, 'id' => 'r' ] ) }}
						</span>
						@if ( Auth::customer()->check() )
							{{ Form::hidden( 'email', Helper::getEmail() ) }}
						@else
							<span class="form-group">
								{{ Form::email( 'email', Input::old( 'email' ), [ 'id' => 'email', 'placeholder' => 'Correo electrónico', 'required' => true, 'class' => 'form-control' ] ) }}
							</span>
						@endif

						<span class="form-group">
							{{ Form::text( 'nombre', Input::old( 'nombre'), [ 'placeholder' => 'Nombre', 'required' => true, 'id' => 'd-nombre', 'class' => 'form-control'] ) }}
						</span>

						<span class="form-group">
							{{ Form::text( 'apellidos', Input::old( 'apellidos'), [ 'placeholder' => 'Apellidos', 'required' => true, 'id' => 'apellidos', 'class' => 'form-control'] ) }}
						</span>


						<div class="check-recibo">
							{{ Form::checkbox( 'recibo', '0', false, [ 'id' => 'check-recibo' ] ) }}
							<label for="check-recibo"></label>¿Necesitas un comprobante deducible de impuestos?
							<div class="check-recibo-hide" style="display:none;font-weight: bold;">
								PARA DONATIVOS REALIZADOS EN EFECTIVO, HAY UN TOPE MARCADO POR LA LEY ANTICORRUPCIÓN
							</div>
						</div>

						<div class="check-verde">
							{{ Form::checkbox( 'mostrar_perfil', '0', false, [ 'id' => 'check-verde' ] ) }}
							<label for="check-verde"></label>No mostrar mi perfil en el sitio
						</div>

						</br></br>
						<input type="submit" value="ACEPTAR">
					{{ Form::close() }}
				</label>
				<a href="{{ URL::to( 'faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" class="icon"></a>
			</div>
		</div>
		<script type="text/javascript">
			(function() {
			   document.body.style.backgroundColor = "#bbd53c";
			})();
		</script>
	@stop
@stop