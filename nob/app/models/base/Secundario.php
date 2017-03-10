<?php

use Nob\Admin\Model\NobBase;

class Base_Secundario extends NobBase
{
    use \Nob\Admin\Model\Traits\FileTrait;    

    protected $table = 'secundario';

    protected $fillable = [
        'titulo',
        'seccion',
        'status'
    ];

    protected $rules = [
        'titulo' => 'required'
    ];
}