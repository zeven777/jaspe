<?php

use Nob\Admin\Model\NobBase;

class Base_ProductoTranslation extends NobBase
{
    protected $table = 'producto_translations';

    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'caracteristicas',
        'tip'
    ];

    protected $rules = [
        'categoria' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'caracteristicas' => 'required',
        'tip' => 'required'
    ];
}