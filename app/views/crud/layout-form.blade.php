@extends("admin.layout")

@section("class")
crud form
@stop

@section("jumbotron")
@stop


@section("content")


@include("crud.toolbar-form")


<div class="container">

	@if($action == "create")
    	{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'), 'method' => 'POST','files'  => true)) }}
    @elseif ($action == "edit")
    	{{ Form::open( array('url' => array(getenv('APP_ADMIN_PREFIX').'/'.$model, $key_value), 'method' => 'PUT','files'  => true)) }}
	@endif

        
        @yield("form")
        



  <div class="pull-right">

  	@if($action == "create")
      @if(in_array("create",$btn))
  		  {{ Form::submit(trans('crud.'.$action), array('class' => 'btn btn-lg btn-success')) }}
      @endif
      @if(in_array("cancel",$btn))
        <a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value) }}" class="btn btn-lg btn-default">{{ trans('crud.cancel') }}</a>
      @endif
      @if(in_array("create",$btn))
        {{ Form::close() }}
      @endif  
    @endif	

    @if($action == "edit")
      @if(in_array("edit",$btn))
        {{ Form::submit(trans('crud.'.$action), array('class' => 'btn btn-lg btn-success')) }}
      @endif
      @if(in_array("cancel",$btn))
        <a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value) }}" class="btn btn-lg btn-default">{{ trans('crud.cancel') }}</a>
      @endif
      @if(in_array("edit",$btn))
        {{ Form::close() }}
      @endif  
    @endif


    @if($action == "show")

      @if(in_array("edit",$btn))
        <a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value."/edit") }}" class="btn btn-lg btn-success">{{ trans('crud.edit') }}</a>
      @endif

      @if(in_array("cancel",$btn))
        <a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model) }}" class="btn btn-lg btn-default">{{ trans('crud.cancel') }}</a>
      @endif
      
      @if(in_array("print",$btn))
        <a class="btn btn-small btn-lg btn-default" target="_blank" href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'. $key_value.'/print') }}" target="_blank">{{ trans('crud.print') }}</a>
      @endif

    @endif  
  </div>


</div>

  <div class="padding-top-lg">
    @include("crud.toolbar-form")
  </div>


    @if($action == "show")
      <div class="container margin-top-md">
        @yield("form-tabs")
      </div>
    @endif

@stop
