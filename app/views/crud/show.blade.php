@extends("crud.layout-form")

@section("form")

	
    @foreach ($columns as $column)
         
				<div class="row">
             @if ($column->is_primary)
                <div class="col-xs-2 text-right bg-primary">
									<h4>{{ Form::label($column->input, $column->label) }}</h4>
								</div>
								<div class="col-xs-10 bg-primary">
									<h4>{{$column->is_primary}}</h4>
                </div>

                </div>
                
						@else
					<div class="col-xs-2 text-right">
						{{ Form::label($column->input, $column->label) }}
					</div>
					<div class="col-xs-10">
						@if($column->is_foreign_key)
							@if(count($fk_column) > 0)
								<td> {{ HTML::link(getenv('APP_ADMIN_PREFIX')."/".strtolower($columns->{$column->name}->model)."/".$record->{$column->name},getFKColumn($fk_column,$column,$record)) }}  </td>
							@else
								<td> {{ HTML::link(getenv('APP_ADMIN_PREFIX')."/".strtolower($columns->{$column->name}->model)."/".$record->{$column->name},$record->{$column->name}) }}  </td>
							@endif
						@else
							<td> {{ Purifier::clean($record->{$column->name}) }}  </td> 
						@endif


					</div>

                </div>
            @endif 
             
       


    @endforeach



@stop



@section("form-tabs")

	@if($tabs and count($tabs) > 0)
		@include("crud.tabs.tabs")
	@endif
@stop





