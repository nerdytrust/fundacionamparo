<?php

return array(

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used
| by the validator class. Some of the rules contain multiple versions,
| such as the size (max, min, between) rules. These versions are used
| for different input types such as strings and files.
|
| These language lines may be easily changed to provide custom error
| messages in your application. Error messages for custom validation
| rules may also be added to this file.
|
*/

"accepted"       => "Los <strong>:attribute</strong> deben ser aceptados.",
"active_url"     => "El campo <strong>:attribute</strong> no es una URL válida.",
"after"          => "El campo <strong>:attribute</strong> debe ser una fecha después de :date.",
"alpha"          => "El campo <strong>:attribute</strong> sólo puede contener letras.",
"alpha_dash"     => "El campo <strong>:attribute</strong> sólo puede contener letras, números y guiones.",
"alpha_num"      => "El campo <strong>:attribute</strong> sólo puede contener letras y números.",
"array"          => "El campo <strong>:attribute</strong> debe ser un arreglo.",
"before"         => "El campo <strong>:attribute</strong> debe ser una fecha antes :date.",
"between"        => array(
		"numeric" => "El campo <strong>:attribute</strong> debe estar entre :min - :max.",
		"file"    => "El campo <strong>:attribute</strong> debe estar entre :min - :max kilobytes.",
		"string"  => "El campo <strong>:attribute</strong> debe estar entre :min - :max caracteres.",
		"array"   => "El campo <strong>:attribute</strong> debe tener entre :min y :max elementos.",
),
"confirmed"      => "El campo <strong>:attribute</strong> confirmación no coincide.",
"date"           => "El campo <strong>:attribute</strong> no es una fecha válida.",
"date_format" 	 => "El campo <strong>:attribute</strong> no corresponde con el formato :format.",
"different"      => "El campo <strong>:attribute</strong> and :other debe ser diferente.",
"digits"         => "El campo <strong>:attribute</strong> debe ser de :digits dígitos.",
"digits_between" => "El campo <strong>:attribute</strong> debe terner entre :min y :max dígitos.",
"email"          => "El formato del <strong>:attribute</strong> es invalido.",
"exists"         => "El campo <strong>:attribute</strong> seleccionado es inválido.",
"image"          => "El campo <strong>:attribute</strong> debe ser una imagen.",
"in"             => "El campo <strong>:attribute</strong> seleccionado es inválido.",
"integer"        => "El campo <strong>:attribute</strong> debe ser un entero.",
"ip"             => "El campo <strong>:attribute</strong> Debe ser una dirección IP válida.",
"match"          => "El formato <strong>:attribute</strong> es inválido.",
"max"            => array(
		"numeric" => "El campo <strong>:attribute</strong> debe ser menor que :max.",
		"file"    => "El campo <strong>:attribute</strong> debe ser menor que :max kilobytes.",
		"string"  => "El campo <strong>:attribute</strong> debe ser menor que :max caracteres.",
		"array"   => "El campo <strong>:attribute</strong> debe tener al menos :min elementos.",
	),

"mimes"         => "El campo <strong>:attribute</strong> debe ser un archivo de tipo :values.",
"min"           => array(
		"numeric" => "El campo <strong>:attribute</strong> debe tener al menos :min.",
		"file"    => "El campo <strong>:attribute</strong> debe tener al menos :min kilobytes.",
		"string"  => "El campo <strong>:attribute</strong> debe tener al menos :min caracteres.",
),
"not_in"                => "El campo <strong>:attribute</strong> seleccionado es invalido.",
"numeric"               => "El campo <strong>:attribute</strong> debe ser un numero.",
"regex"                 => "El formato del campo <strong>:attribute</strong> es inválido.",
"required"              => "El campo <strong>:attribute</strong> es requerido",
"required_if"           => "El campo <strong>:attribute</strong> es requerido cuando el campo :other es :value.",
"required_with"         => "El campo <strong>:attribute</strong> es requerido cuando :values está presente.",
"required_with_all"     => "El campo <strong>:attribute</strong> es requerido cuando :values está presente.",
"required_without"      => "El campo <strong>:attribute</strong> es requerido cuando :values no está presente.",
"required_without_all"  => "El campo <strong>:attribute</strong> es requerido cuando ningún :values está presentes.",
"same"                  => "El campo <strong>:attribute</strong> y :other debe coincidir.",
"size"                  => array(
			"numeric" => "El campo <strong>:attribute</strong> debe ser :size.",
			"file"    => "El campo <strong>:attribute</strong> debe terner :size kilobytes.",
			"string"  => "El campo <strong>:attribute</strong> debe tener :size caracteres.",
			"array"   => "El campo <strong>:attribute</strong> debe contener :size elementos.",
),

"unique" => "El campo <strong>:attribute</strong> ya ha sido tomado.",
"url"    => "El formato de <strong>:attribute</strong> es inválido.",

/*
|--------------------------------------------------------------------------
| Custom Validation Language Lines
|--------------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute_rule" to name the lines. This helps keep your
| custom validation clean and tidy.
|
| So, say you want to use a custom validation message when validating that
| the "email" attribute is unique. Just add "email_unique" to this array
| with your custom message. The Validator will handle the rest!
|
*/

'custom' => array(
	'attribute-name' => array(
	    'rule-name'  => 'custom-message',
	),
),

/*
|--------------------------------------------------------------------------
| Validation Attributes
|--------------------------------------------------------------------------
|
| The following language lines are used to swap attribute place-holders
| with something more reader friendly such as "E-Mail Address" instead
| of "email". Your users will thank you.
|
| The Validator class will automatically search this array of lines it
| is attempting to replace the :attribute place-holder in messages.
| It's pretty slick. We think you'll like it.
|
*/

'attributes' => array(
    'username' => 'usuario',
    'password' => 'contraseña'
),
);