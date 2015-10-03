<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-spei
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="verdeimagen">
			<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button onClick="history.back()" class="regresar">Regresar</button>
				<h2>Pago con Tarjeta de Crédito o Débito</h2>
				<label for="" class="vol">
					{{ Form::open( [ 'url' => 'donacion-pago-tarjeta', 'method' => 'POST', 'autocomplete' => 'off', 'id' => 'form_paycard', 'class' => 'form-paymethod', 'role' => 'form' ] )}}
						<div class="line"></div>
						<div class="alert alert-danger" role="alert" id="messages"></div>
						<span>
							<label for="" class="form-control">Monto a donar</label>
							{{ Form::text( 'monto', $monto, [ 'id' => 'montodonar', 'readonly' => true ] ) }}
						</span>
						<span>
							{{ Form::text( '', '', [ 'id' => 'nombretarjetahabiente', 'placeholder' => 'Nombre del Títular', 'size' => 140, 'data-conekta' => 'card[name]' ] ) }}
						</span>
						<span>
							{{ Form::text( '', '', [ 'id' => 'tarjeta', 'placeholder' => 'Número de la tarjeta de crédito', 'size' => 20, 'data-conekta' => 'card[number]' ] ) }}
						</span>
						<span>
							{{ Form::text( '', '', [ 'id' => 'cvc', 'placeholder' => 'CVC', 'size' => 4, 'data-conekta' => 'card[cvc]', 'class' => 'inputPayCardCVC' ] ) }}
							<img src="{{ asset( 'images/i.png' ) }}" alt="" class="paycardCVC" title="Hooray!">
						</span>
						<span>
							<label for="" class="form-control">Fecha de expiración (MM/AA)</label>
							{{ Form::text( '', '', [ 'id' => 'exp_month', 'placeholder' => 'MM', 'data-conekta' => 'card[exp_month]', 'class' => 'col-sm-4' ] ) }}
							<span class="pay-legend">/</span>
							{{ Form::text( '', '', [ 'id' => 'exp_year', 'placeholder' => 'AA', 'data-conekta' => 'card[exp_year]', 'class' => 'col-sm-4' ] ) }}
						</span>
						<input type="submit" value="SIGUIENTE" id="processPayment">
					{{ Form::close() }}
				</label>
				</br>
				<a href="{{ URL::to( 'faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop