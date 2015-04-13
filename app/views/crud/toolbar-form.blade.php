<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/") }}">
          @if(empty($title))
            {{ strtoupper($model) }}
          @else
            {{ $title }}  
          @endif  
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/") }}">{{ trans('crud.view_all') }}</a></li>
        
        @if(!Entrust::can($model."/show") and in_array("show",$btn))
          @if ($action != "create")
              <li class="@if ($action == 'show') active @endif"><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value) }}">{{ trans('crud.show') }}</a></li>
          @endif
        @endif

        @if(!Entrust::can($model."/create") and in_array("create",$btn))
            <li class="@if ($action == 'create') active @endif"><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/create") }}">{{ trans('crud.create') }}</a></li>
        @endif

        @if(!Entrust::can($model."/edit") and in_array("edit",$btn))
          @if ($action != "create")
              <li class="@if ($action == 'edit') active @endif"><a href="{{ call_user_func("URL::to",getenv('APP_ADMIN_PREFIX').'/'.$model."/".$key_value."/edit") }}">{{ trans('crud.edit') }}</a></li>
          @endif
        @endif

        @if(!Entrust::can($model."/print") and in_array("print",$btn))
          @if ($action != "create")
              <li class="@if ($action == 'edit') active @endif"><a href="{{ URL::to(getenv('APP_ADMIN_PREFIX').'/'.$model.'/'. $key_value.'/print') }}">{{ trans('crud.print') }}</a></li>
          @endif
        @endif

        
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
