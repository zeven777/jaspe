<?php

use Nob\Admin\Model\NobBase;

class Base_EmpresaTranslation extends NobBase
{
    protected $table = 'empresa_translations';

    protected $fillable = [
        'slug',
        'titulo',
        'contenido'
    ];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];
}