<div id="meenus">
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
					<li>{{ HTML::link( '/muro-exito', 'Muro del Éxito', [ 'class' => 'animsition-link' ]) }}</li>
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
				<img src="{{ asset( 'images/monito.jpg' ) }}" alt=""/>
			</div>
		</div>
	</header>
	<div id="conteo_donadores" >
		<div id="int_contado">
			<img src="{{ asset( 'images/icon_donadores.png' ) }}" alt="">
			<h2>249,863</h2>
			<h3>Donadores <span>#TomandoAcciónFA</span></h3>
			@if( isset( $heder_donadores ) )
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
					<select name="" id="">
						<option value="">Filtrar tipo de donador</option>
						<option value="">donadores</option>
						<option value="">voluntarios</option>
					</select>
				</label>
				<button>Todos</button>
			@endif
			<input type="text" placeholder="Buscar">
			<button class="fa fa-search busc"></button>
		</div>
	</div>
</div>