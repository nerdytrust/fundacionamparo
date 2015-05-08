<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )registro
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="entrar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/amparo2.png' ) }}" alt="" class="logo2">
				<h1 class="bien">Bienvenido</h1>
				<h2 class="entrar">Fundación Amparo</h2>
				<label for="" class="vol intro">
					<form>
						<input type="text" name="Name" placeholder="Nombre" id="r" required>
						<input type="text" name="Name" placeholder="Correo" id="r" required>
						<input type="password" placeholder="Contraseña" id="r" required>
						<input type="password" placeholder="Repetir Contraseña" id="r" required>
						<select name="" id="">
							<option value="">Estado</option>
							<option value=""></option>
							<option value=""></option>
						</select>
						<select name="" id="">
							<option value="">Ciudad</option>
							<option value=""></option>
							<option value=""></option>
						</select>
						<div class="check-verde">
							<input type="checkbox" value="None" id="check-verde" name="check">
							<label for="check-verde"></label>
							Acepto los terminos y condiciones
						</div>
						<input type="submit" value="ENTRAR">
					</form>
				</label>
			</div>
		</div>
	@stop
@stop