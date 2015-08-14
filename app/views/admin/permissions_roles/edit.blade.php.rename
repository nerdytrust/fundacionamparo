@extends("crud.layout-form")

@section("form")



<div class="form-group @if ($errors->has('id_permissions')) has-error @endif">

 {{ Form::label("remotecombo", "Permission") }}
   
      {{ Form::remotecombo("id_permissions",$record->id_permissions,["table"=>$model,"class" => "form-control","placeholder"=>"Permission"] ); }}
    
 <span class="help-block">{{ $errors->first('id_permissions') }}</span>
</div>

<div class="form-group @if ($errors->has('id_roles')) has-error @endif">

 {{ Form::label("remotecombo", "Role") }}
   
      {{ Form::remotecombo("id_roles",$record->id_roles,["table"=>$model,"class" => "form-control","placeholder"=>"Role"] ); }}
    
 <span class="help-block">{{ $errors->first('id_roles') }}</span>
</div>

<div class="form-group @if ($errors->has('deny')) has-error @endif">

 {{ Form::label("select", "Deny") }}
   
      {{ Form::combo("deny",$record->deny,["class" => "form-control","placeholder"=>"Deny"],$columns->deny->data ); }}
    
 <span class="help-block">{{ $errors->first('deny') }}</span>
</div>

     

@stop


