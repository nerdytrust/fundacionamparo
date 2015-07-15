<div class="slide-menu navmenu-push navmenu navmenu-default navmenu-fixed-left offcanvas">
	<a class="navmenu-brand" href="#">{{ getenv('APP_TITLE') }}</a>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<ul class="nav navmenu-nav">
			<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/','Home') }}</li>
			<li>
				<a data-toggle="collapse" data-parent="#accordion" href="#admin-menu" aria-expanded="false" aria-controls="admin-menu">
					Administración<span class="caret pull-right margin-top-sm"></span>
				</a>
				<div id="admin-menu" class="panel-body panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-group" id="accordion-helpdesk" role="tablist" aria-multiselectable="true">
						<ul class="nav navmenu-nav">
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','Usuarios') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/causas','Causas') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/apoyamos_causa','Solicitudes de Causas') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/donaciones','Donaciones') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/voluntarios','Voluntarios') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/impulsadas','Impulsores') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/becas','Becas') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/membresias','Membresías') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/faq','FAQs') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/home_video','Video Home') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/muros','Muro') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/noticias','Noticias') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/contacto','Contacto') }}</li>
						</ul>
					</div>
				</div>
			</li>
			<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/logout','Logout') }}</li>
		</ul>
	</div>
</div>