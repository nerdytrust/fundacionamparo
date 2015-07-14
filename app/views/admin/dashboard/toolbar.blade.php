<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-collapse ">
			<ul class="nav navbar-nav navbar-left">
				<li>
					<button type="button" class="navbar-toggle show" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</li>
				<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/',getenv('APP_TITLE'),array('class' => 'navbar-brand')) }}</li>
				<li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/','Home') }}</li>
				<li class="hidden-xs">{{ HTML::link( '/', 'Ver sitio', [ 'target' => '_blank' ] ) }}</li>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','Usuarios') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
						<li class="divider"></li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/causas','Causas') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/apoyamos_causa','Solicitudes de Causas') }}</li>
						<li class="divider"></li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/donaciones','Donaciones') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/voluntarios','Voluntarios') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/impulsadas','Impulsores') }}</li>
						<li class="divider"></li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/becas','Becas') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/contacto','Contacto') }}</li>
						<li class="divider"></li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/membresias','Membresías') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/faq','FAQs') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/home_video','Video Home') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/muro','Muro') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/noticias','Noticias') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{{ Auth::admin()->get()->first_name }} {{ Auth::admin()->get()->last_name }}
						<!-- <span class="caret"></span> -->
					</a>
					<ul class="dropdown-menu" role="menu">
						<!--<li> {{ HTML::link('/profile','My profile') }} </li>
						<li class="divider"></li> -->
						<li> {{ HTML::link(getenv('APP_ADMIN_PREFIX').'/logout','Logout') }}</li>
					</ul>
				</li>
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</div>