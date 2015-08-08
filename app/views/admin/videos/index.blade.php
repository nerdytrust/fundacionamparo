@extends("crud.layout-index")

	@section("table")

		<table class="table table-striped table-bordered ">
			<thead>
				<tr>

					<td> {{ $columns->cover->label }} </td>
					<td> {{ $columns->id_secciones->label }} </td>


					@include("crud.index-column-buttons")

				</tr>
			</thead>
			<tbody>

			
			@foreach($records as $record)
				<tr>


					<td><img src="{{ asset( 'path_image/'  . $record->cover . '/' . '250x150' ) }}" alt=""></td>
					<td>{{ parseToHTML($columns->id_secciones,$record,$fk_column) }}</td>


					@include("crud.index-buttons")

				</tr>
			@endforeach



			</tbody>
		</table>

	@stop