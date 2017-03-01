<?php

use Nob\Admin\Model\NobBase;

class Base_Blog extends NobBase
{
    use \Nob\Admin\Model\Translatable\Translatable;    

    protected $table = 'blog';

    public $translatedAttributes = [
        'slug',
        'titulo',
        'contenido',
        'tag'
    ];

    protected $fillable = [
        'status',
        'highlighted'
    ];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];
}