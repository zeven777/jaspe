<?php

use Nob\Admin\Model\NobBase;

class Base_Testimonio extends NobBase
{
    protected $table = 'testimonio';

    protected $fillable = [
        'slug',
        'nombre',
        'status'
    ];

    protected $rules = [
        'nombre' => 'required'
    ];
}