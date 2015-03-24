@extends("admin.skeleton")
@section("skeleton")


	
    @foreach ($columns as $column)
         

             @if (!$column->is_primary)
                <div class="row">
					
					<div class="col-md-2 text-right">
						{{ Form::label($column->input, $column->label) }}
					</div>
					<div class="col-md-10">
						@if($column->is_foreign_key)
							@if(count($fk_column) > 0)
								<td> {{ HTML::link(strtolower($columns->{$column->name}->model)."/".$record->{$column->name},getFKColumn($fk_column,$column,$record)) }}  </td>
							@else
								<td> {{ HTML::link(strtolower($columns->{$column->name}->model)."/".$record->{$column->name},$record->{$column->name}) }}  </td>
							@endif
						@else
							<td> {{ $record->{$column->name} }}  </td> 
						@endif

					</div>

                </div>
            @endif 
             
       


    @endforeach

<script>
	window.print();
</script>

@stop









