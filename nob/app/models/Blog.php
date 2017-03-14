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

    public static function getHistoryBlogs($paginate = false, $current = null)
    {
        return static::getItems($paginate, $current, [
            'es' => 'historia',
            'en' => 'history',
        ]);
    }

    public static function getItems($paginate = false, $current = null, $tags = null)
    {
        $items = static::whereHas('translations', function($q) use ($current, $tags)
        {
            $q->notEmpty(['titulo','contenido']);

            if( $current instanceof Model ) $q->where('slug','<>',$current->slug);

            if( ! empty($tags) ) $q->where(function($q) use ($tags)
            {
                $lang = app('session')->get('translate_language', app('config')->get('app.locale_default', 'es'));

                if( array_key_exists($lang, (array) $tags) ) foreach( (array) $tags[$lang] as $i => $tag )
                {
                    $method = $i ? 'orWhere' : 'where';

                    $q->$method('tag', 'like', '%' . $tag . '%');
                }
            });
        })->isLocaleTranslated()->hasImages()->active()->latest();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}