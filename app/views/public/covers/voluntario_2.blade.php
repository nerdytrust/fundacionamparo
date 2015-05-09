<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")voluntario
	@stop
	@section("content")
		<div class="lightbox-h" id="naranja1">
			<div class="lightbox-h-cont vol">
				<img src="images/icon_donadores-v.png" alt="">
				<!--<button class="cerrar-h"></button>-->
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>Voluntario</h1>
				<p>Vive directamente la experiencia y ayúdanos a seguir adelante.</p>
				<form method="post">
					<label for="" class="vol">
						<div class="line"></div>
						<p>
							IMPORTANTE </br>
							<span class="gre"> Para poder ser voluntario en esta causa es indispensable que vivas en Puebla.</span>
						</p>
						<input type="text" name="Name" placeholder="Nombre" required id="r">
						<input type="email" name="email" placeholder="Correo electrónico" required id="r">
						<input type="text" name="email" placeholder="Teléfono" required id="r">				
						<input type="submit" value="ACEPTAR" onclick="location.href='{{ URL::to( '/gracias-2' ) }}';">
					</label>
				</form>
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>
			</div><!--termina scN-->
		</div>
	@stop
@stop