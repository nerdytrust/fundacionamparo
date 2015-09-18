<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )registro
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="entrar">
			<div class="lightbox-h-cont donar">
				<button onClick="history.back()" class="regresar"> Regresar</button>
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h1 class="bien">Bienvenido</h1>
				<h2 class="entrar">Fundación Amparo</h2>
				<label for="" class="vol intro">
					{{ Form::open( [ 'url' => 'registrar-usuario', 'id' => 'form_new_member', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
						<div class="alert alert-danger" role="alert" id="messages"></div>
						{{ Form::text( 'name', Input::old( 'name' ), [ 'id' => 'name_input', 'class' => 'r', 'required' => true, 'placeholder' => 'Nombre Completo' ] ) }}
						{{ Form::email( 'email', Input::old( 'email' ), [ 'id' => 'email_input', 'class' => 'r', 'placeholder' => 'Correo electrónico', 'required' => true ] ) }}
						{{ Form::password( 'password', [ 'id' => 'password_input', 'class' => 'r', 'required' => true, 'placeholder' => 'Contraseña' ] ) }}
						{{ Form::password( 'password_confirmation', [ 'id' => 'repassword_input', 'class' => 'r', 'required' => true, 'placeholder' => 'Repetir contraseña' ] ) }}
						<select name="registro_estado" id="beca_estado">
							<option value="0">Estado</option>
							@foreach ( $estados as $estado )
								<option value="{{ $estado->id_estados }}">{{ $estado->name }}</option>
							@endforeach
						</select>
						<select name="registro_ciudad" id="beca_ciudad">
							<option value="0">Ciudad</option>
						</select>
						<div class="check-verde">
							{{ Form::checkbox( 'terminos', 1, false, [ 'id' => 'check-verde' ] ) }}
							<label for="check-verde"></label>
							Acepto los <a class="terminos" href="{{ URL::to( 'terminos-y-condiciones' ) }}" target="_blank" >términos y condiciones</a>
						</div>
						<input type="submit" value="ENTRAR">
					{{ Form::close() }}
				</label>
			</div>
		</div>
	@stop
@stop