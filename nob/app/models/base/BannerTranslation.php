<?php

use Nob\Admin\Model\NobBase;

class Base_BannerTranslation extends NobBase
{
    protected $table = 'banner_translations';

    protected $fillable = [
        'titulo'
    ];

    protected $rules = [
        'titulo' => 'required',
        'color' => 'required'
    ];
}