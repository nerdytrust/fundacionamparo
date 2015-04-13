		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/") }}">
		      		@if(empty($title))
		      			{{ strtoupper($model) }}
		      		@else
		      			{{ $title }}	
		      		@endif	
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="{{ call_user_func("URL::to",$model."/") }}">{{ trans('crud.view_all') }}</a></li>
		        
		        
		        @if(!Entrust::can($model."/create") and in_array("create",$btn))
		        	<li><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/create") }}">{{ trans('crud.create') }}</a></li>
		        @endif

		        @if(!Entrust::can($model."/search") and in_array("search",$btn))
		        	<li>
		        		{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'), 'method' => 'GET','class'  => 'navbar-form form-search-toolbar','role' =>'search')) }}
			                <div class="input-group">

			                    {{ Form::text("search",Input::get('search'),array('class' => 'form-control','placeholder'=> trans('crud.search')) ); }}
			                    <span class="input-group-btn">
			                    	<a href="{{ getenv('APP_ADMIN_PREFIX').'/'.$model.'/' }}" class="btn btn-default">
			                            <span class="glyphicon glyphicon-remove">
			                                <span class="sr-only">Close</span>
			                            </span>
			                    	</a>

			                        <button type="submit" class="btn btn-default">
			                            <span class="glyphicon glyphicon-search">
			                                <span class="sr-only">Tracking Code</span>
			                            </span>
			                        </button>
			                    </span>
			                </div>
			            
			            {{ Form::close() }}
		        	</li>
		        	
		        @endif

		        @if(!Entrust::can($model."/advance-search") and in_array("advance-search",$btn))
		        	<li><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/create") }}">{{ trans('crud.advance_search') }}</a></li>
		        @endif
		      </ul>
			  
			  <div class="pull-right"> {{ $records->links() }} </div>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>