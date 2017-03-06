<?php

use Nob\Admin\Model\NobBase;

class Base_Admin extends NobBase
{
    use \Nob\Admin\Model\Traits\FileTrait;    

    protected $table = 'admin';

    protected $fillable = [
        'username',
        'password',
        'email',
        'tipo',
        'permisos'
    ];

    protected $rules = [
        'username' => 'required|alpha_num|unique:admin,username',
        'password' => 'required_if_create',
        'email' => 'required|email|unique:admin,email',
        'tipo' => 'required',
        'permisos' => 'required_if:tipo,admin,user'
    ];
}