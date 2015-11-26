<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-oxxo
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont p3">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/gracias' ) }}';"></button>
				<h1>PAGO EN OXXO</h1>
				<p>
					<b>Fundación Amparo I.B.P</b><br/>
					Calle 2 Sur No. 708, Centro Histórico, <br/>
					72000 Heróica Puebla de Zaragoza, Pue.
				</p>
				<div class="line"></div>
				<p>
					<b>Nombre:</b> Fundación Amparo</br>
					<b>Fecha:</b> {{ date("d/m/y") }}</br>
					<b>Causa:</b> {{$causa}} </br>
					<b>Aportación:</b> ${{ $monto }}.00</br>
				</p>
				<div class="line"></div>
				<p>
				<img src="{{ asset( 'images/oxxo.png' ) }}" alt="">
				<img src="{{ $captura }}" alt="">
				<b>{{ $codigo_barras }}</b></br>
				</p>
				<p class="extra">
					<b>Línea de captura válida hasta:</b> {{ $expira }}</br></br>
					* Tu aportacion se verá reflejada en un máximo de 72</br>
					 horas. A este monto se deberá  agregar la comisón </br>
					 que cobra OXXO. <b>Pago únicamente en efectivo</b></br>
				</p>
				<label for="" class="vol">
					<input class="hide_print" type="submit" value="IMPRIMIR" id="ac3" onClick="window.print()">
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}" target="_blank" class="help hide_print">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop