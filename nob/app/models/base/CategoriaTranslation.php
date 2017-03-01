<?php

use Nob\Admin\Model\NobBase;

class Base_CategoriaTranslation extends NobBase
{
    protected $table = 'categoria_translations';

    protected $fillable = [
        'slug',
        'nombre'
    ];

    protected $rules = [
        'nombre' => 'required',
        'icon' => 'required'
    ];
}