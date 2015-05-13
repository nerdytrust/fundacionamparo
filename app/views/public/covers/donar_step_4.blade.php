<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-oxxo
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont p3">
				<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
				<h1>PAGO EN OXXO</h1>
				<p>
					Tu aportación se verá reflejada en un máximo de 72 horas.</br>
					 Puedes realizar tu aportación en las tiendas oxxo.
				</p>
				<div class="line"></div>
				<img src="{{ asset( 'images/oxxo.png' ) }}" alt="">
				<p>
					Cuenta:<b>00000000000000000</b></br>
					Nombre del beneficiario: <b>Fundación Amparo</b></br>
					Aportación: <b>$150.00</b>
				</p>
				<label for="" class="vol">
					<input type="submit" value="REGRESAR" id="ac3" onClick="history.back()">
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop