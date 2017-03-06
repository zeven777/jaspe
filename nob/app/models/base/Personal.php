<?php

use Nob\Admin\Model\NobBase;

class Base_Personal extends NobBase
{
    use \Nob\Admin\Model\Traits\FileTrait;    

    protected $table = 'personal';

    protected $fillable = [
        'nombre',
        'lugar',
        'email',
        'telefono',
        'status'
    ];

    protected $rules = [
        'nombre' => 'required',
        'lugar' => 'required',
        'email' => 'required|email',
        'telefono' => 'required'
    ];
}