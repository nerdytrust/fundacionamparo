<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-step-two
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h"></button>
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>donar</h1>
				<p>Toda ayuda es especial y marca una</br> diferencia para alguien.</p>
				<label for="" class="vol">
					<form action="{{ URL::to( '/validar-pago' ) }}" method="POST">
						<div class="imagen p2">
							<img src="{{ asset( 'images/image.png' ) }}" alt="">
							<button>Centros comunitarios</button>
							<p id="nombre">ROBERTO ALONSO ESPINOSA</p>
							<p id="apor"><b>Aportacion</b> $10.00 MXM</p>
						</div>
						<div class="line"></div>
						<div class="check p2">
							<span>
								<input type="radio" name="pago" value="tarjeta" id="tarjeta"  checked>
								<label for="tarjeta">Pagar con tarjeta de crédito/débito</label>
							</span>
							<span>
								<input type="radio" name="pago" value="pay" id="pay" >
								<label for="pay">Pagar con Paypal</label>
							</span>
							<span>
								<input type="radio" name="pago" value="oxxo" id="oxxo" >
								<label for="oxxo">Pago en oxxo</label>
							</span>
							<span>
								<input type="radio" name="pago" value="spei" id="spei" >
								<label for="spei">Transferencia interbancaria (SPEI)</label>
							</span>
						</div>
						<input type="submit" value="SIGUIENTE" id="ac2">							
					</form>	
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop