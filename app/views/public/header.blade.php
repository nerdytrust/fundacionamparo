<div id="meenus">
	{{ Session::forget('donacion'); }}
	{{ Session::forget('voluntario'); }}
	<header>
		<div id="logo">
			<a href="{{ URL::to('/') }}">
				<img src="{{ asset( 'images/amparo.png' ) }}" alt="">
				<h1 id="fundacion-logo">FUNDACIÓN AMPARO</h1>
			</a>
			<div>
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
            </div>
		</div>
		<div id="section_menu" class="pull">
			<nav id="menu_principal">
				<ul id="menu_uno">
					<li>{{ HTML::link( '/como-ayudar', 'Cómo ayudar', [ 'class' => 'animsition-link' ] ) }}</li>
					<li>{{ HTML::link( '/causas-vivas', 'Causas vivas', [ 'class' => 'animsition-link' ] )}}</li>
					<li>{{ HTML::link( '/donadores', 'Donadores', [ 'class' => 'animsition-link' ] ) }}</li>
					{{-- <li>{{ HTML::link( '/muro-exito', 'Muro del Éxito', [ 'class' => 'animsition-link' ]) }}</li> --}}
				</ul>
				<ul id="menu_dos">
					<li>{{ HTML::link( '/fundacion', 'La Fundación', [ 'class' => 'animsition-link' ] ) }}</li>
					<li>{{ HTML::link( '/becas', 'Becas', [ 'class' => 'animsition-link' ] )}}</li>
					<li>{{ HTML::link( '/apoyamos-tu-causa', 'Apoyamos tu causa', [ 'class' => 'animsition-link' ] ) }}</li>
					<li>{{ HTML::link( '/noticias', 'Noticias', [ 'class' => 'animsition-link' ] ) }}</li>
					<li>{{ HTML::link( '/faqs', "Faq's", [ 'class' => 'animsition-link' ] ) }}</li>
					<li>{{ HTML::link( '/contacto', 'Contacto', [ 'class' => 'animsition-link' ] ) }}</li>
				</ul>
			</nav>
			<button id="btn_dona">DONAR</button>
			<div id="perfil">
				@if ( ! Auth::customer()->check() )
					<a href="{{ URL::to( 'login' ) }}">
						<img src="{{ asset( 'images/default-profile.jpg' ) }}" alt="" class="avatar-session" />
					</a>
				@else
					<a href="{{ URL::to( 'salir' ) }}">
						<img src="{{ Helper::getAvatar() }}" alt="" class="avatar-session" />
					</a>
				@endif
			</div>
		</div>
	</header>
	<div id="conteo_donadores" >
		<div id="int_contado">
			<img src="{{ asset( 'images/icon_donadores.png' ) }}" alt="">
			<h2>
				{{ $total_donadores = Session::get( 'total_donadores' ) }}
				@if ( $total_donadores )
					{{ $total_donadores }}
				@endif
			</h2>
			<h3>Donadores <span>#TomandoAcciónFA</span></h3>
			@if( isset( $header_donadores ) )
				<span class="donas">
					<div class="dona fi"><span class="dona-a"></span>Donadores</div> 
					<div class="dona"><span class="dona-b"></span>Impulsores</div> 
					<div class="dona"><span class="dona-c"></span>Voluntarios</div> 
				</span>
			@endif
		</div>
		<div id="int_busc">
			@if( isset( $header_donadores ) )
				<label for="">
					{{ Form::open( [ 'url' => 'donadores', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
						<select name="filtro" id="" onchange='this.form.submit()'>
							<option value="">Filtrar</option>
							<option value="donador" {{ ( Input::get( 'filtro' ) && Input::get( 'filtro' ) == 'donador' ) ? 'selected' : '' }}>Filtrar por donador</option>
							<option value="voluntario" {{ ( Input::get( 'filtro' ) && Input::get( 'filtro' ) == 'voluntario') ? 'selected' : '' }}>Filtrar por voluntarios</option>
							<option value="impulsadas" {{ ( Input::get( 'filtro' ) && Input::get( 'filtro' ) == 'impulsadas' ) ? 'selected' : '' }}>Filtrar por impulsor</option>
						</select>
						
					{{ Form::close() }}
				</label>
				<a href="donadores"><button>Todos</button></a>
			@endif
			{{ Form::open( [ 'url' => 'resultados', 'method' => 'get', 'id' => 'formulario_buscador' ] ) }}
				<input name="s" type="text" placeholder="Buscar">
				<button class="fa fa-search busc" type="submit"></button>
			{{ Form::close() }}
		</div>
	</div>
</div>