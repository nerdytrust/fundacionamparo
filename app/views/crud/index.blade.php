@extends("crud.layout-index")

	@section("table")

		<table class="table table-striped table-bordered ">
			<thead>
				<tr>

					@foreach ($columns as $column)
						<td> {{ $column->label }} </td> 
					@endforeach

					@include("crud.index-column-buttons")

				</tr>
			</thead>
			<tbody>

			
			@foreach($records as $record)
				<tr>

					@foreach ($columns as $column)
						<td>{{ parseToHTML($column,$record,$fk_column) }}</td>
					@endforeach	

					@include("crud.index-buttons")

				</tr>
			@endforeach



			</tbody>
		</table>

	@stop