<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-spei
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
			<div class="lightbox-h-cont p3">
				<h1>TRANSFERENCIA (SPEI)</h1>
				<p>
					Tu aportación se verá reflejada de inmediato.</br>
					Entra a tu banca en línea e ingresa la siguiente información.
				</p>
				<div class="line"></div>
				<p>
					Banco a elegir: <b>Sistema de Transferencias y Pagos STP</b></br>
					CLABE Interbancaria:<b>00000000000000000</b></br>
					Nombre del beneficiario: <b>Fundación Amparo</b></br>
					Aportación: <b>$150.00</b>
				</p>
				<label for="" class="vol">
					<input type="submit" value="REGRESAR" id="ac3" onClick="history.back()">	
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" ></br></a>
			</div>
		</div>
	@stop
@stop