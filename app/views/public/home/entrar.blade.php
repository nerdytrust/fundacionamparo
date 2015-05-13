<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )entrar
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="entrar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h1 class="bien">Bienvenido</h1>
				<h2 class="entrar">Fundación Amparo</h2>
				<label for="" class="vol intro">
					<form>
						<input type="text" name="Name" placeholder="Nombre" id="r" required>
						<input type="password" placeholder="Contraseña" id="r" required>
						<a href="{{ URL::to( '/' ) }}" class="olvido">¿Olvidaste tu contraseña?</a>
						<input type="submit" value="ENTRAR">
					</form>
					<div class="line"></div>
				</label>
				<p>O entrar a tu cuenta de Facebook</p>
				<a href="{{ URL::to( '/login/facebook' ) }}"><button class="face-btn"></button></a>
				<p><a href="{{ URL::to( '/registro' ) }}">¿Aun no estas registrado?</a></p>
			</div>
		</div>
	@stop
@stop