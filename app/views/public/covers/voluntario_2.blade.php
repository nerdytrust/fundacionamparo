<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")voluntario
	@stop
	@section("content")
		<div class="lightbox-h v" id="naranja1">
			<div class="lightbox-h-cont vol">
				<img src="images/icon_donadores-v.png" alt="">
				<!--<button class="cerrar-h"></button>-->
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<h1>Voluntario</h1>
				<p>Vive directamente la experiencia y ayúdanos a seguir adelante.</p>
				{{ Form::open( [ 'url' => 'continuar-voluntario', 'method' => 'POST', 'id' => 'form_continuacion_voluntario', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
					<div class="alert alert-danger" role="alert" id="messages"></div>
					<label for="" class="vol">
						<div class="line"></div>
						<p>
							IMPORTANTE </br>
							<span class="gre"> Para poder ser voluntario en esta causa es indispensable que vivas en Puebla.</span>
						</p>
						{{ Form::text( 'nombre', Input::old( 'nombre' ), [ 'id' => 'r', 'placeholder' => 'Nombre', 'maxlenght' => '180' ] ) }}
						{{ Form::text( 'apellidos', Input::old( 'apellidos' ), [ 'id' => 'r', 'placeholder' => 'Apellidos', 'maxlenght' => '180' ] ) }}
						@if ( Auth::customer()->check() )
							{{ Form::hidden( 'email', Helper::getEmail() ) }}
						@else
							{{ Form::email( 'email', Input::old( 'email' ), [ 'id' => 'r', 'placeholder' => 'Correo electrónico', 'required' => true, 'class' => 'form-control' ] ) }}
						@endif
						{{ Form::text( 'telefono', Input::old( 'telefono' ), [ 'id' => 'r', 'placeholder' => 'Teléfono', 'required' => true ] ) }}
						<input type="submit" value="ACEPTAR">
					</label>
				{{ Form::close() }}
				<a href="{{ URL::to( 'faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>
			</div><!--termina scN-->
		</div>
	@stop
@stop