<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")donar
	@stop
	@section("content")
		<div class="lightbox-h d" id="verde1">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h"></button>
				<button onClick="history.back()" class="regresar">Regresar</button>
				<h1>donar</h1>
				<p>
					Tu ayuda es importante y </br>marca la diferencia para muchos.
				</p>
				<label for="" class="vol">
					<p>Escoge la causa que quieras apoyar</p>
					{{ Form::open( [ 'url' => 'donar', 'method' => 'POST', 'autocomplete' => 'off' ] ) }}
						{{ Form::hidden( 'no_mostrar_perfil', '0' ) }}
						{{ $errors->first( 'causa_donar', '<div class="alert alert-danger" role="alert">:message</div>') }}
						<select name="causa_donar" id="">
							@if ( isset( $causas ) )
								@foreach ( $causas as $causa )
									<option value="{{ $causa->id_causas }}">{{ $causa->titulo }}</option>
								@endforeach
							@endif
						</select>
						<p>Ingresa el monto que desaes donar</p>
						{{ $errors->first( 'monto', '<div class="alert alert-danger" role="alert">:message</div>') }}
						<span class="op">
							{{ Form::text( 'monto', '', [ 'placeholder' => '10.00', 'maxlength' => 8, 'required' => true, 'id' => 'r' ] ) }}
						</span>
						<div class="check-verde">
							{{ Form::checkbox( 'no_mostrar_perfil', '1', false, [ 'id' => 'check-verde' ] ) }}
							<label for="check-verde"></label>No mostrar mi perfil en el sitio
						</div>
						</br></br>
						<input type="submit" value="ACEPTAR">
					{{ Form::close() }}
				</label>
				<a href="{{ URL::to( 'faqs' ) }}">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" class="icon"></a>
			</div>
		</div>
	@stop
@stop