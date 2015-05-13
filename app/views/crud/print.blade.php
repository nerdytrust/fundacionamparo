@extends("admin.skeleton")
@section("skeleton")


	
    @foreach ($columns as $column)
         

             @if (!$column->is_primary)
                <div class="row">
					
					<div class="col-xs-2 text-right">
						{{ Form::label($column->input, $column->label) }}
					</div>
					<div class="col-xs-10">
						@if($column->is_foreign_key)
							<?php
								$is_with_link = getFKColumn($column->name,$record,$fk_column);
							?>
							@if($is_with_link != "---")
								<td> {{ HTML::link(getenv('APP_ADMIN_PREFIX')."/".strtolower($columns->{$column->name}->model)."/".$record->{$column->name},$is_with_link) }}  </td>
							@else
								<td> {{ $is_with_link }}  </td>
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









