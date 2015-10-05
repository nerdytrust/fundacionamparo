<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-spei
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont p3">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/gracias' ) }}';"></button>
				<h1>TRANSFERENCIA (SPEI)</h1>
				<div class="line"></div>
				<p>
					Estos son los datos necesarios</br>
					para que puedas apoyar a la causa
					<b>{{ $causa }}</b>
				</p>
				<p>
					Ingresa a tu banca en línea y registra</br>
					los siguientes datos:
				</p>
				<p>
					<!--Banco a elegir: <b>Sistema de Transferencias y Pagos STP</b></br>-->
					Banco: <b>{{ $banco }}</b></br>
					CLABE: <b>{{ $clabe }}</b></br>
					Beneficiario: <b>Fundación Amparo</b></br>
					Aportación: <b>${{ $monto }}.00</b></br>
					Línea de captura válida hasta: <b>{{ $expira }}</b>
				</p>
				<label for="" class="vol">
					<input class="hide_print" type="submit" value="IMPRIMIR" id="ac3" onClick="window.print()">	
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}" target="_blank" class="help hide_print">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" ></br></a>
			</div>
		</div>
	@stop
@stop