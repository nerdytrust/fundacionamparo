<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")impulsar-causa
	@stop
	@section("content")
		<div class="lightbox-h i" id="azul1">
			<div class="lightbox-h-cont imp">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<h1>impulsar</h1>
				<p>Lleguemos a más oídos y toquemos más corazones en una sola voz</p>
				<!--<button class="cerrar-h"></button>-->
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<div class="imagen">
					<img src="{{ asset( 'images/image.png' ) }}" alt="">
						<button>centros comunitarios</button>
						<p>Roberto Alonso Espinoza</p>
				</div>
				</br>
				<div class="check-azul">
					<input type="checkbox" value="None" id="check-azul" name="check" />
					<label for="check-azul"></label>
					No mostrar mi perfil en el sitio
				</div>
				<button class="feis">
					<div id="invitar" onclick="location.href='{{ URL::to( '/gracias-3' ) }}';">Invitar a 10 amigos</div>
				</button>	
				<a href="{{ URL::to( '/faqs' ) }}">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>			
			</div>	
		</div>
	@stop
@stop