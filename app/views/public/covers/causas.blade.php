<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")donar-causas
	@stop
	@section("content")
		<div class="lightbox-h d" id="verdeimagen">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h"></button>
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>donar</h1>
				<p>
					Tu ayuda es importante y </br>marca la diferencia para muchos.
				</p>
				<label for="" class="vol">
					<form action="">
						<div class="imagen">
							<img src="{{ asset( 'images/image.png' ) }}" alt="">
							<button>Centros comunitarios</button>
							<p id="nombre">ROBERTO ALONSO ESPINOSA</p>
						</div>
						<p>Ingresa el monto que desaes donar</p>
						<span class="op">
							<input type="text" name="monto" placeholder="10.00" maxlength="8" required id="r">
						</span>
						<div class="check-verde">
							<input type="checkbox" value="None" id="check-verde" name="check" />
							<label for="check-verde"></label>
							No mostrar mi perfil en el sitio
						</div>
						</br>
						<input type="submit" value="ACEPTAR" id="ac">							
					</form>	
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}">
					Si necesitas ayuda dar click aquí
					<img src="{{ asset( 'images/i.png' ) }}" alt=""></br>
				</a>
			</div>
		</div> 
	@stop
@stop