@extends("crud.layout-form")



	@section("form-tabs")

		@if($tabs and count($tabs) > 0)
			@include("crud.tabs.tabs")
		@endif
	@stop


@stop


