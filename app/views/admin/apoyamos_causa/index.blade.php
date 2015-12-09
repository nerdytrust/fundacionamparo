@extends("crud.layout-index")

	@section("table")

		<table class="table table-striped table-bordered ">
			<thead>
				<tr>

					<td> {{ $columns->id_apoyamos_causa->label }} </td>
					<td> {{ $columns->nombre->label }} </td>
					<td> {{ $columns->telefono->label }} </td>
					<td> {{ $columns->email->label }} </td>
					<td> {{ $columns->id_categorias->label }} </td>
					<td> {{ $columns->descripcion->label }} </td>
					<td> {{ $columns->aprobacion->label }} </td>
					<td> {{ $columns->ip->label }} </td>


					@include("crud.index-column-buttons")

				</tr>
			</thead>
			<tbody>

			
			@foreach($records as $record)
				<tr>


					<td>{{ parseToHTML($columns->id_apoyamos_causa,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->nombre,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->telefono,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->email,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->id_categorias,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->descripcion,$record,$fk_column) }}</td>
					<td>@if ($record->aprobacion == 1) Aprobado @else Pendiente @endif</td>
					<td>{{ parseToHTML($columns->ip,$record,$fk_column) }}</td>


					@include("crud.index-buttons")

				</tr>
			@endforeach



			</tbody>
		</table>

	@stop