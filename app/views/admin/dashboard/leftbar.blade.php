    <div class="slide-menu navmenu-push navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#">{{ getenv('APP_TITLE') }}</a>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <ul class="nav navmenu-nav">
	
  <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/','Home') }}</li>
  <li>
    <a data-toggle="collapse" data-parent="#accordion" href="#freight-menu" aria-expanded="false" aria-controls="freight-menu">
      Freight Manager <span class="caret pull-right margin-top-sm"></span>
    </a>
    <div id="freight-menu" class="panel-body panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

		
		<div class="panel-group" id="accordion-customers" role="tablist" aria-multiselectable="true">
		  <ul class="nav navmenu-nav">
			
		  <li>
		    <a data-toggle="collapse" data-parent="#accordion-customers" href="#customers-menu" aria-expanded="true" aria-controls="customers-menu">
		      Customers <span class="caret pull-right margin-top-sm"></span>
		    </a>
		    <div id="customers-menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
		      	<ul class="nav navmenu-nav">
		        	<li><a href="../navmenu/">Customer Manager</a></li>
		        	<li><a href="../navmenu/">Points Manager</a></li>
		        </ul>
		      </div>
		    </div>
		  </li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/tracking','Trackings') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/pobox','POBOX') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/awb','AWB') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/manifest','Manifest') }}</li>
		  <li>
		    <a data-toggle="collapse" data-parent="#accordion-documents" href="#documents-menu" aria-expanded="true" aria-controls="documents-menu">
		      Documents <span class="caret pull-right margin-top-sm"></span>
		    </a>
		    <div id="documents-menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
			      <ul class="nav navmenu-nav">
			      	<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/master_awb','Master AWB') }}</li>
			      	<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/certificate','Certificates') }}</li>
			      	<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/handover','HandOver') }}</li>
			      	<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/blading','Bill of Lading') }}</li>
			      </ul>
		      </div>
		    </div>
		  </li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/invoice','Invoices') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/payments','Payments') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/rates','Rates') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/reports','Reports') }}</li>

		  </ul>
		</div>


    </div>
  </li>



  <li>
    <a data-toggle="collapse" data-parent="#accordion" href="#crm-menu" aria-expanded="false" aria-controls="crm-menu">
      CRM<span class="caret pull-right margin-top-sm"></span>
    </a>
    <div id="crm-menu" class="panel-body panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

		
		<div class="panel-group" id="accordion-helpdesk" role="tablist" aria-multiselectable="true">
		  <ul class="nav navmenu-nav">
			
		  <li><a href="#">New Applications</a></li>	
		  <li>
		    <a data-toggle="collapse" data-parent="#accordion-helpdesk" href="#helpdesk-menu" aria-expanded="true" aria-controls="helpdesk-menu">
		      HelpDesk <span class="caret pull-right margin-top-sm"></span>
		    </a>
		    <div id="helpdesk-menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
		      	<ul class="nav navmenu-nav">
		        	<li><a href="../navmenu/">Messages</a></li>
		        </ul>
		      </div>
		    </div>
		  </li>
		  <li>
		    <a data-toggle="collapse" data-parent="#accordion-documents" href="#documents-menu" aria-expanded="true" aria-controls="documents-menu">
		      Forms <span class="caret pull-right margin-top-sm"></span>
		    </a>
		    <div id="documents-menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
			      <ul class="nav navmenu-nav">
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_probshp','Problem Shipments') }}</li>
					<li>Shop America</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_pickup','Pick Up Instructions') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_claims','Claims') }}</li>
					<li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/cmb_nf_shpinst','Shipping Instructions') }}</li>
			      	<li><a href="#">Unidentifed Shipments</a></li>
			      </ul>
		      </div>
		    </div>
		  </li>
		   <li><a href="#">Newsletter</a></li>
		   <li><a href="#">Tutorials</a></li>
		  <li>
		    <a data-toggle="collapse" data-parent="#accordion-tools" href="#tools-menu" aria-expanded="true" aria-controls="tools-menu">
		      Tools <span class="caret pull-right margin-top-sm"></span>
		    </a>
		    <div id="tools-menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
		      	<ul class="nav navmenu-nav">
		        	<li><a href="#">Shipping Calculator</a></li>
		        </ul>
		      </div>
		    </div>
		  </li>




		  </ul>
		</div>


    </div>
  </li>



  <li>
    <a data-toggle="collapse" data-parent="#accordion" href="#admin-menu" aria-expanded="false" aria-controls="admin-menu">
      Administration<span class="caret pull-right margin-top-sm"></span>
    </a>
    <div id="admin-menu" class="panel-body panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

		
		<div class="panel-group" id="accordion-helpdesk" role="tablist" aria-multiselectable="true">
		  <ul class="nav navmenu-nav">
			
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','User manager') }}</li>
		   <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>
		   <li><a href="#">Task manager (Cron)</a></li>
		   <li><a href="#">Setup</a></li>
		   <li><a href="#">Logs</a></li>

		  </ul>
		</div>


    </div>
  </li>
  <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/logout','Logout') }}</li>

  </ul>
</div>

		




    </div>