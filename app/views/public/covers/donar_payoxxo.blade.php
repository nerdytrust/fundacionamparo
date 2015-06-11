<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-oxxo
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont p3">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<h1>PAGO EN OXXO</h1>
				<p>
					Tu aportación se verá reflejada en un máximo de 72 horas.</br>
					 Puedes realizar tu aportación en las tiendas oxxo.
				</p>
				<div class="line"></div>
				<img src="{{ asset( 'images/oxxo.png' ) }}" alt="">
				<p>
					<img src="{{ $captura }}" alt="">
					<b>{{ $codigo_barras }}</b></br>
					Beneficiario: <b>Fundación Amparo</b></br>
					Aportación: <b>${{ $monto }}.00</b></br>
					Línea de captura válida hasta: <b>{{ $expira }}</b>
				</p>
				<label for="" class="vol">
					<input type="submit" value="IMPRIMIR" id="ac3" onClick="window.print()">
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop