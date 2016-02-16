
@if ((bool) array_intersect(["create","edit","show","delete"], $btn))
<!-- we will also add show, edit, and delete buttons -->
<td style="width:300px">

	{{ Form::open(array('url' => getenv('APP_ADMIN_PREFIX').'/'.$model.'/' . $record->{ $key_name })) }}
	<div class="btn-group input-group btn-group-justified" role="group" aria-label="...">

	  @if(!Entrust::can($model."/show") and in_array("show",$btn))
		  <div class="btn-group" role="group">
		    <a class="btn btn-small btn-success" href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/' . $record->{ $key_name } . '/show') }}">{{ trans('crud.show') }}</a>
		  </div>
	  @endif
	  @if(!Entrust::can($model."/print") and in_array("print",$btn))
		  <div class="btn-group" role="group">
		    <a class="btn btn-small btn-default" target="_blank" href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'. $record->{ $key_name }.'/print') }}">{{ trans('crud.print') }}</a>
		  </div>
	  @endif
	  @if(!Entrust::can($model."/edit") and in_array("edit",$btn))
		  <div class="btn-group" role="group">
		    <a class="btn btn-small btn-info"  href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/' . $record->{ $key_name } . '/edit') }}">{{ trans('crud.edit') }}</a>
		  </div>
	   @endif
	   	  
	  @if(!Entrust::can($model."/destroy") and in_array("delete",$btn)) 	  
		  <div class="btn-group" role="group">
				{{ Form::hidden('_method', 'DELETE') }}
				<a class="btn btn-small btn-warning" data-toggle="confirmation" data-placement="bottom">{{ trans('crud.delete') }}</a>
				
		  </div>
	  @endif
	</div>
	{{ Form::close() }}




</td>
@endif