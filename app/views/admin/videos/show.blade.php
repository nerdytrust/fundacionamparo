@extends("crud.layout-show")

@section("form")

	
	
<div class="row">
	<div class="col-xs-2 text-right bg-primary h4">
		{{ Form::label($columns->id_videos->input, $columns->id_videos->label) }}
	</div>
	<div class="col-xs-10 h4">
		{{ parseToHTML($columns->id_videos,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->cover->input, $columns->cover->label) }}
	</div>
	<div class="col-xs-10 ">
		<img src="{{ asset( 'path_image/'  . $record->cover . '/' . '600x400' ) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->video->input, $columns->video->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->video,$record,$fk_column) }}
	</div>
</div>
<div class="row">
	<div class="col-xs-2 text-right ">
		{{ Form::label($columns->id_secciones->input, $columns->id_secciones->label) }}
	</div>
	<div class="col-xs-10 ">
		{{ parseToHTML($columns->id_secciones,$record,$fk_column) }}
	</div>
</div>
@stop



