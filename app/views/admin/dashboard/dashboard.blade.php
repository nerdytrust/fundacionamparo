@extends("admin.layout")

@section("class")
dashboard
@stop

@section("jumbotron")
@stop


@section("content")

<div class="row equal">
	<div class="col-sm-6 col-md-6 col-lg-4">
		<div class="panel panel-primary">
	      <div class="panel-heading">
	        <h3 class="panel-title">Administración</h3>
	      </div>
	      <div class="panel-body">
			<ul>
				<li>General</li>
					<ul>
						<li>Administración de Usuarios</li>
						<ul>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','Usuarios') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
						</ul>
					</ul>			
				<li>Sitio</li>
				<ul>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/causas','Causas') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/apoyamos_causa','Solicitudes de Causas') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/donaciones','Donaciones') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/voluntarios','Voluntarios') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/impulsadas','Impulsores') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/becas','Becas') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/membresias','Membresías') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/faq','FAQs') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/home_video','Video Home') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/muro','Muro') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/noticias','Noticias') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/contacto','Contacto') }}</li>
				</ul>
			</ul>
	      </div>
		</div>
	</div>
</div>

@stop