<?php

use Illuminate\Database\Eloquent\Model;

class Blog extends Base_Blog
{
    protected $with = ['translations','images','image'];

    public static function getBlog($slug)
    {
        return static::whereHas('translations', function($q) use ($slug)
        {
            $q->where('slug',$slug);
        })->hasImages()->active()->first();
    }

    public static function getBlogs($paginate = false, $current = null)
    {
        return static::getItems($paginate, $current);
    }

    public static function getItems($paginate = false, $current = null)
    {
        $items = static::whereHas('translations', function($q) use ($current)
        {
            $q->notEmpty(['titulo','contenido']);

            if( $current instanceof Model ) $q->where('slug','<>',$current->slug);
        })->isLocaleTranslated()->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}