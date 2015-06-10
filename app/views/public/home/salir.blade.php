<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )salir
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="salir">
			<div class="lightbox-h-cont donar">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h2 class="entrar">Cerrar Sesión</h2>
				<label for="" class="vol">
					<input type="submit" value="SALIR" id="ac3" onclick="location.href='{{ URL::to( 'logout' ) }}';">
				</label>
				</br>
				<a href="{{ URL::to( 'faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div>
	@stop
@stop