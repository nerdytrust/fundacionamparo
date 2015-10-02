<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")donar-causa
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
					{{ Form::open( [ 'url' => 'nueva-donacion', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form', 'id' => 'form_nueva_donacion' ] ) }}
						{{ Form::hidden( 'mostrar_perfil', '0' ) }}
						<div class="imagen">
							<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '282x280' ) }}" alt="">
							<button>{{ $causa->id_categorias_record->nombre }}</button>
							<p id="nombre">{{ $causa->titulo }}</p>
						</div>
						<p>Ingresa el monto que desaes donar</p>
						<span class="op">
							{{ Form::text( 'monto', Input::old( 'monto'), [ 'placeholder' => '10.00', 'maxlength' => 8, 'required' => true, 'id' => 'r' ] ) }}
						</span>
						<span class="form-group">
							@if ( Auth::customer()->check() )
								{{ Form::hidden( 'email', Helper::getEmail() ) }}
							@else
								{{ Form::email( 'email', Input::old( 'email' ), [ 'id' => 'email', 'placeholder' => 'Correo electrónico', 'required' => true, 'class' => 'form-control' ] ) }}
							@endif
						</span>
						<div class="check-verde">
							{{ Form::checkbox( 'mostrar_perfil', '0', false, [ 'id' => 'check-verde' ] ) }}
							<label for="check-verde"></label>No mostrar mi perfil en el sitio
						</div>
						</br>
						<input type="submit" value="ACEPTAR" id="ac">
						{{ Form::hidden( 'causa_donar', $causa->id_causas ) }}
					{{ Form::close() }}
				</label>
				</br>
				<a href="{{ URL::to( '/faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt=""></br></a>
			</div>
		</div> 
	@stop
@stop