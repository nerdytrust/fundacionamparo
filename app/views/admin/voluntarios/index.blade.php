@extends("crud.layout-index")

	@section("table")

		<table class="table table-striped table-bordered ">
			<thead>
				<tr>

					<td> {{ $columns->id_causas->label }} </td>
					<td> {{ $columns->nombre->label }} </td>
					<td> {{ $columns->apellidos->label }} </td>
					<td> {{ $columns->email->label }} </td>
					<td> {{ $columns->telefono->label }} </td>
					<td> {{ $columns->aprobacion->label }} </td>


					@include("crud.index-column-buttons")

				</tr>
			</thead>
			<tbody>

			
			@foreach($records as $record)
				<tr>


					<td>{{ parseToHTML($columns->id_causas,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->nombre,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->apellidos,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->email,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->telefono,$record,$fk_column) }}</td>
					<td>@if ($record->aprobacion == 1) Aprobado @else Pendiente @endif</td>


					@include("crud.index-buttons")

				</tr>
			@endforeach



			</tbody>
		</table>

	@stop