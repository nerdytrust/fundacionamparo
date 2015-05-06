{{ Form::open(array('url' => 'temp_view', 'method' => 'post')) }}

<input type="text" name="first">
<input type="text" name="second">

{{ Form::submit("SEND", array('class' => 'btn btn-success')) }}

{{ Form::close() }}