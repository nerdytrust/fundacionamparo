<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )entrar
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="entrar">
			<div class="lightbox-h-cont donar">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h1 class="bien">Bienvenido</h1>
				<h2 class="entrar">Fundación Amparo</h2>
				<label for="" class="vol intro">
					{{ Form::open() }}
						{{ Form::email( 'username', Input::old( 'username' ), [ 'class' => 'r', 'id' => 'username', 'placeholder' => 'Correo Electrónico', 'required' => true ] ) }}
						{{ Form::password( 'password', [ 'class' => 'r', 'id' => 'password', 'placeholder' => 'Contraseña', 'required' => true ] ) }}
						<a href="{{ URL::to( 'recuperar-password' ) }}" class="olvido">¿Olvidaste tu contraseña?</a>
						<input type="submit" value="ENTRAR">
					{{ Form::close() }}
					<div class="line"></div>
				</label>
				<p>O entrar a tu cuenta de Facebook</p>
				<a href="{{ URL::to( 'login/facebook' ) }}"><button class="face-btn"></button></a>
				<p><a href="{{ URL::to( 'registro' ) }}">¿Aun no estas registrado?</a></p>
			</div>
		</div>
	@stop
@stop