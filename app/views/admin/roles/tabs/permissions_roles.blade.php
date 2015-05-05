

<div class="padding-top-lg">

	<div class="combo-msg"></div>

	<form role="form">
		<div class="form-group">
			<select name="" id="" equired="required" class="form-control combo">
				<option value="" selected="selected">Choose a Module...</option>
				@foreach($permission->combo->get() as $combo)

					<option value="{{ $combo->id_permissions }}">{{ $combo->name }}</option>
				@endforeach	
			</select>




		</div>
	</form>

	<div class="table-responsive combo-table hidden">
	  <table class="table table-striped">
	  	<thead>
		  	<tr>
		  		<th>Action</th>
		  		<th>Deny</th>
		  	</tr>
	  	</thead>
	  	<tbody>
	  		
			
				@foreach($permission->groups->get() as $groups)
				<tr opt-id-parent="{{ $groups->id_parent_permissions }}" class="hidden">	
					<td>{{ $groups->display_name }}</td>
					<td>  <input class="switch" type="checkbox" opt-id-permissions-roles="{{ $groups->id_permissions_roles }}"  opt-id-permissions="{{ $groups->id_permissions }}" opt-id-roles="{{ $key_value }}" @if(is_numeric($groups->id_permissions_roles)) checked @endif ></td>
				</tr>	
				@endforeach

		  	
		</tbody>  	
	  </table>
	</div>
</div>
