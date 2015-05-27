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
					{{ Form::open( [ 'url' => 'donar', 'method' => 'POST', 'autocomplete' => 'off' ] )}}
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
							<span>
								{{ Form::radio( 'metodo_pago', 'oxxo', false, [ 'id' => 'oxxo' ] ) }}
								<label for="oxxo">Pago en oxxo</label>
							</span>
							<span>
								{{ Form::radio( 'metodo_pago', 'spei', false, [ 'id' => 'spei' ] ) }}
								<label for="spei">Transferencia interbancaria (SPEI)</label>
							</span>
						</div>
						<input type="submit" value="SIGUIENTE" id="ac2">
						{{ Form::hidden( 'causa_token', $causa->id_causas ) }}
						{{ Form::hidden( 'causa_hash', $monto )}}
					{{ Form::close() }}							
					</form>	
				</label>
				</br>
				<a href="{{ URL::to( 'faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop