<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => ":attribute debe ser aceptado.",
	"active_url"       => ":attribute no es una URL válida.",
	"after"            => ":attribute debe ser una fecha despues de :date.",
	"alpha"            => ":attribute puede contener solo letras.",
	"alpha_dash"       => ":attribute puede contener letras, numeros, y guiones.",
	"alpha_num"        => ":attribute puede contener solo letras y numeros.",
	"array"            => ":attribute debe ser un arreglo.",
	"before"           => ":attribute debe ser una fecha antes de :date.",
	"between"          => array(
		"numeric" => ":attribute debe estar entre :min y :max.",
		"file"    => ":attribute debe ser entre :min y :max kb.",
		"string"  => ":attribute debe estar entre :min y :max caracteres.",
		"array"   => ":attribute debe tener entre :min y :max itemes.",
	),
	"confirmed"        => "confirmacion de :attribute no coincide.",
	"date"             => ":attribute no es una fecha valida.",
	"date_format"      => ":attribute no coincide con el formato :format.",
	"different"        => ":attribute y :other deben ser diferentes.",
	"digits"           => ":attribute debe ser de :digits digitos.",
	"digits_between"   => ":attribute debe estar entre :min y :max digitos.",
	"email"            => "format de :attribute es invalido.",
	"exists"           => ":attribute seleccionado es invalido.",
	"image"            => ":attribute debe ser una imagen.",
	"in"               => ":attribute seleccionado es invalido.",
	"integer"          => ":attribute debe ser un entero.",
	"ip"               => ":attribute debe ser una direccion IP valida.",
	"max"              => array(
		"numeric" => ":attribute no puede ser mayor a :max.",
		"file"    => ":attribute no puede ser mayor de :max kb.",
		"string"  => ":attribute no puede ser mayor de :max caracteres.",
		"array"   => ":attribute no puede tener mas de :max itemes.",
	),
	"mimes"            => ":attribute debe ser un archivo de tipo: :values.",
	"min"              => array(
		"numeric" => ":attribute debe ser al menos :min.",
		"file"    => ":attribute debe ser al menos :min kb.",
		"string"  => ":attribute debe ser de al menos :min caracteres.",
		"array"   => ":attribute debe tener al menos :min itemes.",
	),
	"not_in"           => ":attribute seleccionado es invalido.",
	"numeric"          => ":attribute debe ser un numero.",
	"regex"            => "formato de :attribute es invalido.",
	"required"         => "campo :attribute es requerido.",
	"required_if"      => "campo :attribute es requerido cuando :other es :value.",
	"required_with"    => "campo :attribute es requerido cuando :values esta presente.",
	"required_without" => "campo :attribute es requerido cuando :values no esta presente.",
	"same"             => ":attribute y :other deben coincidir.",
	"size"             => array(
		"numeric" => ":attribute debe ser :size.",
		"file"    => ":attribute debe ser de :size kb.",
		"string"  => ":attribute debe ser de :size caracteres.",
		"array"   => ":attribute debe contener :size itemes.",
	),
	"unique"           => ":attribute ya se ha tomado.",
	"url"              => "formato :attribute es invalido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
