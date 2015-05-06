@extends("crud.layout-form")

@section("form")



<div class="form-group @if ($errors->has('first_name')) has-error @endif">

 {{ Form::label("text", "First name") }}
   
      <input class="form-control" placeholder="First name" required="1" name="first_name" type="text" value="{{ $record->first_name }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('first_name') }}</span>
</div>

<div class="form-group @if ($errors->has('last_name')) has-error @endif">

 {{ Form::label("text", "Last name") }}
   
      <input class="form-control" placeholder="Last name" required="1" name="last_name" type="text" value="{{ $record->last_name }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('last_name') }}</span>
</div>

<div class="form-group @if ($errors->has('sex')) has-error @endif">

 {{ Form::label("select", "Sex") }}
   
      <select class="form-control" name="sex"></select>
    
 <span class="help-block">{{ $errors->first('sex') }}</span>
</div>

<div class="form-group @if ($errors->has('email')) has-error @endif">

 {{ Form::label("email", "Email") }}
   
      <input class="form-control" placeholder="Email" required="1" name="email" type="email" value="{{ $record->email }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('email') }}</span>
</div>

<div class="form-group @if ($errors->has('password')) has-error @endif">

 {{ Form::label("text", "Password") }}
   
      <input class="form-control" placeholder="Password" required="1" name="password" type="text" value="{{ $record->password }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('password') }}</span>
</div>

<div class="form-group @if ($errors->has('last_ip')) has-error @endif">

 {{ Form::label("text", "Last ip") }}
   
      <input class="form-control" placeholder="Last ip" required="" name="last_ip" type="text" value="{{ $record->last_ip }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('last_ip') }}</span>
</div>

<div class="form-group @if ($errors->has('ip_mask')) has-error @endif">

 {{ Form::label("text", "Ip mask") }}
   
      <input class="form-control" placeholder="Ip mask" required="" name="ip_mask" type="text" value="{{ $record->ip_mask }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('ip_mask') }}</span>
</div>

<div class="form-group @if ($errors->has('status')) has-error @endif">

 {{ Form::label("select", "Status") }}
   
      <select class="form-control" name="status"></select>
    
 <span class="help-block">{{ $errors->first('status') }}</span>
</div>

<div class="form-group @if ($errors->has('id_roles')) has-error @endif">

 {{ Form::label("number", "Role") }}
   
      <input class="form-control" placeholder="Role" required="1" name="id_roles" type="number" value="{{ $record->id_roles }}" autocomplete="off">
    
 <span class="help-block">{{ $errors->first('id_roles') }}</span>
</div>

     

@stop


