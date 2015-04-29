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
	        <h3 class="panel-title">Freight Manager</h3>
	      </div>
	      <div class="panel-body">

			<ul>
				<li>
					Customers
					<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/pcustomer','Customers Manager') }}</li>
						<li>Points</li>
						<ul>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_points','Points Manager') }}</li>
							<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_invitation','Customers Invitations') }}</li>
						</ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_crmtickets','Tickets') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/invoice','Invoices') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/payments','Payments') }}</li>						
						</ul>						
				
				</li>
				<li>
					Package Work Flow
					<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/tracking','Trackings') }}</li>
							<ul>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_lost_items','Unidentified Items.') }}</li>		
							</ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/pobox','Warehouse Receipt') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/awb','AWB') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/manifest','Manifest') }}</li>
						<li>
							Documents
							<ul>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/mawb','Master AWB') }}</li>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/certificate','Certificates') }}</li>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/handover','HandOver') }}</li>
								<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/blading','Bill of Lading') }}</li>
							</ul>
						</li>						
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/delivery_reports','Delivery Report') }}</li>
					</ul>
				</li>
				<li>
					Reports
					<ul>
						<li>TBD 1</li>
						<li>TBD 2</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/reports','Custom Reports') }}</li>
					</ul>
				</li>
				<li>
					Tools
					<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/rates','Rates') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/reports','Reports') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/tracking_carrier','Carriers') }}</li>
						<li>Shipping Calculator</li>
					</ul>
				</li>

			</ul>

	      </div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6 col-lg-4">
		<div class="panel panel-primary">
	      <div class="panel-heading">
	        <h3 class="panel-title">CRM</h3>
	      </div>
	      <div class="panel-body">

			<ul>
				<li>New Applications</li>
				<li>
					HelpDesk
					<ul>
						<li>Messages</li>
					</ul>
				</li>
				<li>
					Forms
					<ul>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_probshp','Problem Shipments') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_shop','Shop America') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_pickup','Pick Up Instructions') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_claims','Claims') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_shpinst','Shipping Instructions') }}</li>
						<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_lost','Unidentifed Shipments') }}</li>
					</ul>
				</li>
				<li>Newsletter</li>
				<li>Tutorials</li>

			</ul>
			<form target="_blank" class="form-inline" method="POST" action="customer/autologin">
			  <div class="form-group">
			    <label for="exampleInputName2">Customer Login</label>
			    <input type="text" class="form-control" name="id" placeholder="" size="4">
			  </div>
			
			  <button type="submit" class="btn btn-default">GO</button>
			</form>

	      </div>
		</div>
	</div>
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