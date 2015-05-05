<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")voluntario
	@stop
	@section("content")
		<div class="lightbox-h" id="naranja1">
			<div class="lightbox-h-cont vol">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<!--<button class="cerrar-h"></button>-->
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>Voluntario</h1>
				<p>Vive directamente la experiencia y ayúdanos a seguir adelante.</p>
				<div class="line"></div>
				<div class="scN" id="style-3">
					<form action="{{ URL::to( '/voluntario-2' ) }}">
						<p>¿En qué causa nos quieres ayudar?</p>
						<label for="" class="vol">
							<select name="" id="">
								<option value="">Museo Amparo</option>
								<option value=""></option>
								<option value=""></option>
							</select>
							<p>¿Cómo puedes ayudar?</p>
							<select name="" id="">
								<option value="">Capacitación</option>
								<option value=""></option>
								<option value=""></option>
							</select>
							<input type="submit" value="Siguiente" onclick="location.href='{{ URL::to( '/voluntario-2' ) }}';">
						</label>
					</form>
					<a href="fundacion_faqs.html">
						Si necesitas ayuda da click aquí 
						<img src="{{ asset( 'images/i.png' ) }}" alt="">
					</a>
				</div><!--termina scN-->
			</div>
		</div>
	@stop
@stop