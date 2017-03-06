<?php

use Nob\Admin\Model\NobBase;

class Base_Contacto extends NobBase
{
    use \Nob\Admin\Model\Traits\FileTrait;    

    protected $table = 'contacto';

    protected $fillable = [
        'titulo',
        'contenido',
        'latitude','longitude','zoom',
        'status'
    ];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];
}