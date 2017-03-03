<?php

class Producto extends Base_Producto
{
    public static function getProduct($slug)
    {
        return static::whereHas('translations',function($q) use ($slug)
        {
            $q->where('slug', $slug)->notEmpty([
                'nombre',
                'descripcion',
                'caracteristicas',
                'tip'
            ]);
        })->hasImages()->active()->first();
    }

    public static function getProducts($paginate = false, $category = null)
    {
        return static::getItems($paginate, false, $category);
    }

    public static function getHighlightedProducts($paginate = false)
    {
        return static::getItems($paginate, true);
    }

    public static function getItems($paginate = false, $highlighted = false, $category = null)
    {
        $items = static::whereHas('categoria',function($q) use ($category)
        {
            $q->isLocaleTranslated()->active();

            if( $category ) $q->whereHas('translations',function($q) use ($category)
            {
                $q->where('slug',$category);
            });
        })->isLocaleTranslated()->active();

        if( $highlighted ) $items->highlighted();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}