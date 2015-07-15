<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-paypal
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont p3">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<h1>PAGO MEDIANTE PAYPAL</h1>
				<p>
					Tu aportación se verá reflejada de inmediato.</br>
				</p>
				<div class="line"></div>
				<p>
					Beneficiario: <b>Fundación Amparo</b></br>
					Causa: <b>{{ $causa->titulo }}</b></br>
					Aportación: <b>${{ $monto }}.00</b></br>
					Para proceder con el pago mediante este método, 
					es necesario que hagas clic en el botón de abajo e ingresarás al portal de <b>PAYPAL</b> para continuar con el proceso.
				</p>
				<label for="" class="vol">
					{{ Form::open( [ 'url' => 'pasarela-paypal', 'id' => 'form_paypal_donacion', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ] )}}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						<input type="submit" value="PAGAR" id="ac3">
					{{ Form::close() }}
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" ></br></a>
			</div>
		</div>
	@stop
@stop