
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
					
				@endforeach


			</tr>
		@endforeach
		</tbody>
	</table>

		<div class="text-center"> {{ $records->links() }} </div>


</div>

<script type="text/javascript">
  $(".show-tabs.active .pagination a").click(function(){
      var id = $(".show-tabs.active").attr("id");
      tabajax("#"+id,$(this).attr("href"));
      return false;
  });
</script>



