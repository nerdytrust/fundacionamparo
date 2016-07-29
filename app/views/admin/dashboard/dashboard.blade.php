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
							 @if(Auth::admin()->id() == 2 || Auth::admin()->id() == 4)
							 	<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/permissions','Permisos') }}</li>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/permissions_roles','Permisos Roles') }}</li>
							@endif
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
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/videos','Videos') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/muros','Muro') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/noticias','Noticias') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/contacto','Contacto') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/registrados','Registrados') }}</li>
				</ul>
			</ul>
	      </div>
		</div>
	</div>
</div>

@stop