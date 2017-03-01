<?php

use Nob\Admin\Model\NobBase;

class Base_Empresa extends NobBase
{
    use \Nob\Admin\Model\Translatable\Translatable;    

    protected $table = 'empresa';

    public $translatedAttributes = [
        'slug',
        'titulo',
        'contenido'
    ];

    protected $fillable = [
        'highlighted',
        'status'
    ];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];
}