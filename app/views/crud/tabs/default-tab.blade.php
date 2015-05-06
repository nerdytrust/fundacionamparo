
<div class="table-responsive">
	<table class="table table-striped table-bordered ">
		<thead>
			<tr>
				@foreach ($columns as $column)
					<td> {{ $column->label }} </td> 
					
				@endforeach
				
			</tr>
		</thead>
		<tbody>


		
		@foreach($records as $record)
			<tr>

				@foreach ($columns as $column)
					@if(starts_with($column->name,"id_"))
					
							<td> {{ HTML::link( getenv('APP_ADMIN_PREFIX')."/".substr( $column->name,3)."/".$record->{$column->name},$record->{$column->name}) }}  </td>

					@else
						<td> {{ $record->{$column->name} }}  </td> 
					@endif
					
				@endforeach



			</tr>
		@endforeach
		</tbody>
	</table>

		@if(count($records) == 0)
			<div class="padding-lg">
				<p class="text-center">{{ trans('crud.not_records_found') }}</p>
			</div>
			
		@endif
</div>



