<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-step-two
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>donar</h1>
				<p>Toda ayuda es especial y marca una</br> diferencia para alguien.</p>
				<label for="" class="vol">
					{{ Form::open( [ 'url' => 'paso-dos-donacion', 'id' => 'form_step_two_donacion', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ] )}}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						<div class="imagen p2">
							<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '113x124' ) }}" alt="">
							<button type="button">{{ $causa->id_categorias_record->nombre }}</button>
							<p id="nombre">{{ $causa->titulo }}</p>
							<p id="apor"><b>Aportacion</b> ${{ $monto }} MXM</p>
						</div>
						<div class="line"></div>
						<div class="check p2">
							<span>
								{{ Form::radio( 'metodo_pago', 'tarjeta', true, [ 'id' => 'tarjeta' ] ) }}
								<label for="tarjeta">Pagar con tarjeta de crédito/débito</label>
							</span>
							<span>
								{{ Form::radio( 'metodo_pago', 'paypal', false, [ 'id' => 'pay' ] ) }}
								<label for="pay">Pagar con Paypal</label>
							</span>
							<div class="check-verde check-verde-display-none">
								{{ Form::checkbox( 'recurrente', 1, false, [ 'id' => 'check-verde' ] ) }}
								<label for="check-verde" class="check"></label>
								Deseas hacer una donación mensual
							</div>
							<span>
								{{ Form::radio( 'metodo_pago', 'oxxo', false, [ 'id' => 'oxxo' ] ) }}
								<label for="oxxo">Pago en OXXO</label>
							</span>
							<span>
								{{ Form::radio( 'metodo_pago', 'spei', false, [ 'id' => 'spei' ] ) }}
								<label for="spei">Transferencia interbancaria (SPEI)</label>
							</span>
							
						</div>

						<div class="check-recibo">
							{{ Form::checkbox( 'recibo', '0', false, [ 'id' => 'check-recibo' ] ) }}
							<label for="check-recibo"></label>¿Necesitas un comprobante deducible de impuestos?
						</div>

						<label for="" class="vol">
							<p>Nombre</p>
							
							<div class="alert alert-danger" role="alert" id="messages"></div>
							<span class="form-group">
								{{ Form::text( 'r_nombre', Input::old( 'r_nombre'), [ 'placeholder' => 'Nombre', 'required' => true, 'id' => 'r_nombre', 'class' => 'form-control'] ) }}
							</span>
							
							<p>RFC</p>
							<span class="form-group">
								{{ Form::text( 'r_rfc', Input::old( 'r_rfc' ), [ 'id' => 'r_rfc', 'placeholder' => 'RFC', 'required' => true, 'class' => 'form-control' ] ) }}
							</span>

							<p>Domicilio Fiscal</p>
							<span class="form-group">
								{{ Form::text( 'r_domicilio_fiscal', Input::old( 'r_domicilio_fiscal' ), [ 'id' => 'r_domicilio_fiscal', 'placeholder' => 'Domicilio Fisca', 'required' => true, 'class' => 'form-control' ] ) }}
							</span>

							<p>Email</p>
							<span class="form-group">
								{{ Form::email( 'r_email', Input::old( 'r_email' ), [ 'id' => 'r_email', 'placeholder' => 'Correo electrónico', 'required' => true, 'class' => 'form-control' ] ) }}
							</span>
						
						</label>

						<img src="{{ asset( 'images/visa.png' ) }}" class="card">
						<img src="{{ asset( 'images/mastercard.png' ) }}" class="card">
						<img src="{{ asset( 'images/americanexpress.png' ) }}" id="american" class="card">
						<input type="submit" id="ac2" value="SIGUIENTE" />
						{{ Form::hidden( 'causa_token', Crypt::encrypt( $causa->id_causas ) ) }}
						{{ Form::hidden( 'causa_hash', Crypt::encrypt( $monto ) )}}
					{{ Form::close() }}
				</label>
				</br>
				<a href="{{ URL::to( 'faqs' ) }}" target="_blank">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop