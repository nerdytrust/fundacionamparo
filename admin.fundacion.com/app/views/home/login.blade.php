@extends("layout")

@section("class")
login
@stop

@section("jumbotron")
@stop


@section("content")




<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			 	</div>
			  	<div class="panel-body">
			    	{{ Form::open(['route' => 'login/email','method'=>'post', 'role'=>'form']) }}
                    <fieldset>
			    	  	<div class="form-group @if ($errors->has('email')) has-error @endif">
			    		    {{ Form::email("email", $value = null, ["class"=>"form-control", "id"=>"exampleInputEmail1", "data-invalid"=>"false" ,"placeholder"=>"Email"]); }}
			    			<span class="help-block">{{ $errors->first("email"); }}</span>
			    		</div>
			    		<div class="form-group @if ($errors->has('password')) has-error @endif">
			    			{{ Form::password("password", ["class"=>"form-control", "id"=>"exampleInputPassword1" ,"placeholder"=>"Password"]); }}
			    			<span class="help-block">{{ $errors->first("password"); }}</span>
			    		</div>

			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	{{ Form::close() }}

			    </div>
			</div>
		</div>
	</div>
</div>
@stop