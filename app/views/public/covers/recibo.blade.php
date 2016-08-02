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
				<h1>Recibo de donativo</h1>
				<p>
					PARA DONATIVOS REALIZADOS EN EFECTIVO, HAY UN TOPE MARCADO POR LA LEY ANTICORRUPCIÓN
				</p>
				<label for="" class="vol">
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

						<div class="check-recibo">
							{{ Form::checkbox( 'recibo', '0', false, [ 'id' => 'check-recibo' ] ) }}
							<label for="check-recibo"></label>¿Necesitas un recibo de donativo?
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
	@stop
@stop