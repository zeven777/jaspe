<?php

use Nob\Admin\Model\NobBase;

class Base_BlogTranslation extends NobBase
{
    protected $table = 'blog_translations';

    protected $fillable = [
        'slug',
        'titulo',
        'contenido',
        'tag'
    ];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];
}