@if ((bool) array_intersect(["create","edit","show","delete"], $btn))
	<td>{{ trans('crud.action') }}</td>
@endif	