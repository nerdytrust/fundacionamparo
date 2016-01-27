<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")impulsar
	@stop
	@section("content")
		<div class="lightbox-h i" id="azul2">
			<div class="lightbox-h-cont imp">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<h1>impulsar</h1>
				<p>Lleguemos a más oídos y toquemos más corazones en una sola voz</p>
				<!--<button class="cerrar-h"></button>-->
				<button onClick="location.href='{{ URL::to( '/' );}}'" class="regresar"> Regresar</button>
				<label for="" class="vol" id="imp-r">
					<p>Escoge la causa que quieras impulsar</p>
					<select name="causa_impulsar" id="causa_impulsar">
						@if ( isset( $causas ) )
							@foreach ( $causas as $causa )
								<option value="{{ $causa->id_causas }}">{{ $causa->titulo }}</option>
							@endforeach
						@endif
					</select>
				</label>
			
				<div class="check-azul">
					<input type="checkbox" value="None" id="check-azul" name="check" />
					<label for="check-azul"></label>No mostrar mi perfil en el sitio
				</div>
				
				<span class="feis">	
					@if ( Helper::getRegisterIsFB() )
						{{ Helper::facebookShareImpulsor2( '<div id="invitar">Comparte</div>', URL::to( '/' ),'' ) }}   
					@else
						<div id="entrarfb" onclick="location.href='{{ URL::to( '/fb-impulsar' ) }}';">Entra con FaceBook</div>
					@endif
				</span>	
				
					
				
				<a href="{{ URL::to( '/faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>			
			</div>	
		</div>
	@stop
@stop