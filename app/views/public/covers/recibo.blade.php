<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")donar
	@stop
	@section("content")
		<div class="lightbox-h d" id="verde1">
			<div class="lightbox-h-cont donar" id="form_proccess_donation">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h"></button>
				<button onClick="history.back()" class="regresar">Regresar</button>
				<h1>Recibo de donativo</h1>
				<p>
					PARA DONATIVOS REALIZADOS EN EFECTIVO, HAY UN TOPE MARCADO POR LA LEY ANTICORRUPCIÓN
				</p>
				<label for="" class="vol">
						<p>Nombre</p>
						<span class="op">
							{{ Form::text( 'r_nombre', Input::old( 'r_nombre'), [ 'placeholder' => 'Nombre', 'required' => true, 'id' => 'r_nombre' ] ) }}
						</span>
						
						<p>RFC</p>
						<span class="form-group">
							{{ Form::text( 'r_rfc', Input::old( 'r_rfc' ), [ 'id' => 'r_rfc', 'placeholder' => 'RFC', 'required' => true, 'class' => 'form-control' ] ) }}
						</span>

						<p>Domiciolo Fiscal</p>
						<span class="form-group">
							{{ Form::text( 'r_domicilo_fiscal', Input::old( 'r_domicilo_fiscal' ), [ 'id' => 'r_domicilo_fiscal', 'placeholder' => 'Domicilio Fisca', 'required' => true, 'class' => 'form-control' ] ) }}
						</span>

						<p>Email</p>
						<span class="form-group">
							{{ Form::email( 'r_email', Input::old( 'r_email' ), [ 'id' => 'r_email', 'placeholder' => 'Correo electrónico', 'required' => true, 'class' => 'form-control' ] ) }}
						</span>

						</br></br>
						<input type="submit" value="ACEPTAR">
					{{ Form::close() }}
				</label>
				<a href="{{ URL::to( 'faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí <img src="{{ asset( 'images/i.png' ) }}" alt="" class="icon"></a>
			</div>
		</div>
	@stop
@stop