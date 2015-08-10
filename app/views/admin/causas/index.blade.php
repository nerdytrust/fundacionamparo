@extends("crud.layout-index")
	<?php setlocale(LC_MONETARY, 'en_US'); ?>
	@section("table")

		<table class="table table-striped table-bordered ">
			<thead>
				<tr>

					<td> {{ $columns->titulo->label }} </td>
					<td> {{ $columns->fecha->label }} </td>
					<td> {{ $columns->meta->label }} </td>
					<td> {{ $columns->orden->label }} </td>
					<td> {{ $columns->me_gusta_interno->label }} </td>
					<td> {{ $columns->id_categorias->label }} </td>
					<td> {{ $columns->id_tipo_causas->label }} </td>


					@include("crud.index-column-buttons")

				</tr>
			</thead>
			<tbody>

			
			@foreach($records as $record)
				<tr>


					<td>{{ parseToHTML($columns->titulo,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->fecha,$record,$fk_column) }}</td>
					<td>{{ money_format('%.2n', $record->meta) }}</td>
					<td>{{ parseToHTML($columns->orden,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->me_gusta_interno,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->id_categorias,$record,$fk_column) }}</td>
					<td>{{ parseToHTML($columns->id_tipo_causas,$record,$fk_column) }}</td>


					@include("crud.index-buttons")

				</tr>
			@endforeach



			</tbody>
		</table>

	@stop