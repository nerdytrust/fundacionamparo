<div class="notes">

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
							@if(count($fk_column) > 0)
								<td> {{ HTML::link(getenv('APP_ADMIN_PREFIX')."/".strtolower($columns->{$column->name}->model)."/".$record->{$column->name},getFKColumn($fk_column,$column,$record,false)) }}  </td>
							@else
								<td> {{ HTML::link(getenv('APP_ADMIN_PREFIX')."/".strtolower($columns->{$column->name}->model)."/".$record->{$column->name},$record->{$column->name}) }}  </td>
							@endif
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

	
	<a data-toggle="modal" class="notes-modal" href="./admin/{{$table}}/create" data-target="#modal">
		<span class="glyphicon glyphicon-plus"></span>
	</a>

	<script type="text/javascript">
		ModalAjax(".notes-modal",function($status,$modal){
			
			var $me = $(this);

			setTimeout(function(){
				
				FormAjax(function(data){
					var obj = jQuery.parseJSON( data );

					if(obj.success == "false")
						alert(obj.msg);
					else
					{
						$modal.modal('hide');
						var tab = $(".tab-pane.active");
						var id  = tab.attr("id");
						$(".nav-tabs.list").find("[data-target=#"+id+"]").trigger("click");
					}
						
				});

				
			},3000);

		});
		// $(".notes-modal").click(function(){

		//   	$('#modal .modal-content').load('./cmb/login_ajax',function(result){
			    
		// 	    $('#modal').modal({show:true}).css("z-index",1041);
		// 	});
		//   });

	</script>

</div>



