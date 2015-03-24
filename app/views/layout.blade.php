@extends("skeleton")
@section("skeleton")



    <!-- if there are creation errors, they will show here -->
    @if ($errors->all())
      <div class="alert alert-danger" role="alert">
        {{ HTML::ul($errors->all()) }}
      </div>
    @endif

    <!-- will be used to show any messages -->
    @if (Session::has('success'))
      <div class="alert alert-success" role="alert">{{ Session::get('success') }} :)</div>
    @endif

    @if (Session::has('error'))
      <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }} :(
      </div>
    @endif

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron @yield('jumbotron')">

      @if (Auth::check())
        @include("dashboard.leftbar")
        @include("dashboard.toolbar")
      @endif
        
      <div class="container">
        @yield("content")
      </div>

    </div>




@stop