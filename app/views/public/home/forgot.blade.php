<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )recuperar-contrasena
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="entrar">
			<div class="lightbox-h-cont donar">
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h2 class="entrar">Recuperar Contraseña</h2>
				<label for="" class="vol intro">
					{{ Form::open( [ 'url' => 'enviar-password', 'id' => 'form_forgot_password', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						{{ Form::email( 'username', Input::old( 'username' ), [ 'class' => 'r', 'id' => 'username', 'placeholder' => 'Correo Electrónico', 'required' => true ] ) }}
						<input type="submit" value="RECUPERAR">
					{{ Form::close() }}
					<div class="line"></div>
				</label>
				<p><a href="{{ URL::to( 'registro' ) }}">¿Aun no estas registrado?</a></p>
			</div>
		</div>
	@stop
@stop