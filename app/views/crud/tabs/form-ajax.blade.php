
<div class="padding-md">

	@if($action == "create")
    	{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'), 'method' => 'POST','files'  => true, 'data-async'=> 'data-async')) }}
    @elseif ($action == "edit")
    	{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model, $key_value), 'method' => 'PUT','files'  => true,'data-async'=> 'data-async')) }}
	@endif

        
    {{ Form::hidden("form-ajax", true) }}

	@include("crud.form")


	@if($action == "create")
    @if(in_array("create",$btn))
		  {{ Form::submit(trans('crud.'.$action), array('class' => 'btn btn-success')) }}
    @endif
    @if(in_array("cancel",$btn))
      <span class="btn btn-default cancel">{{ trans('crud.cancel') }}</span>
    @endif
    @if(in_array("create",$btn))
      {{ Form::close() }}
    @endif  
  @endif	

  @if($action == "edit")
    @if(in_array("edit",$btn))
      {{ Form::submit(trans('crud.'.$action), array('class' => 'btn btn-success')) }}
    @endif
    @if(in_array("cancel",$btn))
      <span class="btn btn-default cancel">{{ trans('crud.cancel') }}</span>
    @endif
    @if(in_array("edit",$btn))
      {{ Form::close() }}
    @endif  
  @endif


  @if($action == "show")

    @if(in_array("edit",$btn))
      <a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value."/edit") }}" class="btn btn-success">{{ trans('crud.edit') }}</a>
    @endif

    @if(in_array("cancel",$btn))
      <span class="btn btn-default cancel">{{ trans('crud.cancel') }}</span>
    @endif
    
    @if(in_array("print",$btn))
      <a class="btn btn-small btn-default" target="_blank" href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'. $key_value.'/print') }}" target="_blank">{{ trans('crud.print') }}</a>
    @endif

  @endif  




  
</div>
