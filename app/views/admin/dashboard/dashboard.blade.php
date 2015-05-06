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
	        <h3 class="panel-title">Administration</h3>
	      </div>
	      <div class="panel-body">
			<ul>
				<li>General</li>
					<ul>
						<li>Users Administration</li>
						<ul>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','User manager') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
							<li>Logs</li>
					</ul>
					<li>Setup</li>
						<ul>
							<li>Task manager (Cron)</li>
							<li>Setup</li>
					</ul>
					<li>Agency</li>
						<ul>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/agency','Agency manager') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/agency','Templates') }}</li>
					</ul>


					</ul>
				
				<li>Web Site</li>
				<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cms_pages','Content Manager') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cms_images','Images Manager') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cms_videos','Video Manager') }}</li>
						<li>Forms</li>
					<ul>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/web_career','Career') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/web_contactus','Contact  Us') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/web_cmbaplication','CMB Application') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/web_shop','Shop America') }}</li>
							
					</ul>	
				</ul>	
				<li>CMB Site</li>
				<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_cms','Content Manager') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cms_images','Images Manager') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cms_videos','Video Manager') }}</li>
				</ul>
			</ul>
	      </div>
		</div>
	</div>
</div>

@stop