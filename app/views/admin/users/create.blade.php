@extends("crud.layout-form")

@section("form")



<div class="form-group @if ($errors->has('first_name')) has-error @endif">

 {{ Form::label("text", "Nombre") }}
   
      {{ Form::text("first_name",$record->first_name,["class" => "form-control","placeholder"=>"Nombre"]); }}
    
 <span class="help-block">{{ $errors->first('first_name') }}</span>
</div>

<div class="form-group @if ($errors->has('last_name')) has-error @endif">

 {{ Form::label("text", "Apellidos") }}
   
      {{ Form::text("last_name",$record->last_name,["class" => "form-control","placeholder"=>"Apellidos"]); }}
    
 <span class="help-block">{{ $errors->first('last_name') }}</span>
</div>

<div class="form-group @if ($errors->has('sex')) has-error @endif">

 {{ Form::label("select", "Sexo") }}
   
      {{ Form::combo("sex",$record->sex,["class" => "form-control","placeholder"=>"Sexo"],$columns->sex->data ); }}
    
 <span class="help-block">{{ $errors->first('sex') }}</span>
</div>

<div class="form-group @if ($errors->has('email')) has-error @endif">

 {{ Form::label("email", "Email") }}
   
      {{ Form::email("email",$record->email,["class" => "form-control","placeholder"=>"Email"]); }}
    
 <span class="help-block">{{ $errors->first('email') }}</span>
</div>

<div class="form-group @if ($errors->has('password')) has-error @endif">

 {{ Form::label("text", "Password") }}
   
      {{ Form::text("password",$record->password,["class" => "form-control","placeholder"=>"Password"]); }}
    
 <span class="help-block">{{ $errors->first('password') }}</span>
</div>

<div class="form-group @if ($errors->has('status')) has-error @endif">

 {{ Form::label("select", "Status") }}
   
      {{ Form::combo("status",$record->status,["class" => "form-control","placeholder"=>"Status"],$columns->status->data ); }}
    
 <span class="help-block">{{ $errors->first('status') }}</span>
</div>

<div class="form-group @if ($errors->has('id_roles')) has-error @endif">
   	{{Form::hidden('id_roles', 2 )}}
 <span class="help-block">{{ $errors->first('id_roles') }}</span>
</div>

     

@stop


