<?php

use Nob\Admin\Model\NobBase;

class Base_Testimonio extends NobBase
{
    use \Nob\Admin\Model\Traits\FileTrait;    

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