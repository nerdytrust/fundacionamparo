@extends("admin.layout")

@section("class")
crud index
@stop

@section("jumbotron")
@stop


@section("content")



		@include("crud.toolbar")

			@yield("table")
			
		@include("crud.toolbar")
		
	

@stop



