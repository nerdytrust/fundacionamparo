

		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
<!-- 		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">{{ strtoupper($tab->model) }}</a>
		    </div> -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="{{ call_user_func("URL::to",$tab->model."/") }}">View All</a></li>
		        <li><a href="{{ call_user_func("URL::to",$tab->model."/create") }}">Create</a></li>
		        
		      </ul>


		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>


		<table class="table table-striped table-bordered ">
			<thead>
				<tr>
					@foreach ($tab->columns as $column)
						<td> {{ $column->label }} </td> 
					@endforeach

		            <td class="col-md-3">{{ trans('crud.action') }}</td>
				</tr>
			</thead>
			<tbody>
			@foreach($tab->records->get() as $record)
				<tr>

					@foreach ($tab->columns as $column)
						<td> {{ $record->{$column->name} }} </td> 
					@endforeach

					<!-- we will also add show, edit, and delete buttons -->
					<td>
						{{ Form::open(array('url' => $tab->model.'/' . $record->{ $tab->key_name })) }}
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
						    <a class="btn btn-small btn-success" href="{{ URL::to($tab->model.'/' . $record->{ $tab->key_name }) }}">{{ trans('crud.show') }}</a>
						  </div>
						  <div class="btn-group" role="group">
						    <a class="btn btn-small btn-info" href="{{ URL::to($tab->model.'/' . $record->{ $tab->key_name } . '/edit') }}">{{ trans('crud.edit') }}</a>
						  </div>
						  <div class="btn-group" role="group">
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::submit(trans('crud.delete'), array('class' => 'btn btn-small btn-warning')) }}
						  </div>
						</div>
						{{ Form::close() }}




					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
