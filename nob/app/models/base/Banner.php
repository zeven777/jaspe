<?php

use Nob\Admin\Model\NobBase;

class Base_Banner extends NobBase
{
    use \Nob\Admin\Model\Translatable\Translatable;    

    use \Nob\Admin\Model\Traits\FileTrait;    

    protected $table = 'banner';

    public $translatedAttributes = [
        'titulo'
    ];

    protected $fillable = [
        'color',
        'url',
        'status',
        'highlighted'
    ];

    protected $rules = [
        'titulo' => 'required',
        'color' => 'required',
        'url' => 'url'
    ];
}