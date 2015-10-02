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
					{{ Form::open( [ 'url' => 'nuevo-voluntario', 'method' => 'POST', 'id' => 'form_nuevo_voluntario', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						<p>¿En qué causa nos quieres ayudar?</p>
						<label for="" class="vol">
							<select name="causa_voluntario" id="">
								@if ( isset( $causas ) )
									@foreach ( $causas as $causa )
										<option value="{{ $causa->id_causas }}">{{ $causa->titulo }}</option>
									@endforeach
								@endif
							</select>
							<p>¿Cómo puedes ayudar?</p>							
							<select name="tipo_ayuda" id="tipo_ayuda">
								@foreach ( $ayudas as $ayuda )
									<option value="{{ $ayuda->id_tipo_ayudas }}">{{ $ayuda->name }}</option>
								@endforeach
							</select>
							<input type="submit" value="Siguiente">
						</label>
					{{ Form::close() }}
					<a href="{{ URL::to( 'faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>
				</div><!--termina scN-->
			</div>
		</div>
	@stop
@stop