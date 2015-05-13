@extends("public.skeleton")
	@section("skeleton")
		@if(!isset($disable_header))
			@include("public.header")
		@endif

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<!--<div class="jumbotron @yield('jumbotron')">-->
		@yield("top-content")
			<div class="container">
				@yield("content")
			</div>

		<!--</div>-->
		@if(!isset($disable_footer))
			@include("public.footer")
		@endif
	@stop
@stop