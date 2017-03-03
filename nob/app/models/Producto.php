<?php

class Producto extends Base_Producto
{
    public static function getProducts($paginate = false)
    {
        return static::getItems($paginate);
    }

    public static function getHighlightedProducts($paginate = false)
    {
        return static::getItems($paginate, true);
    }

    public static function getItems($paginate = false, $highlighted = false)
    {
        $items = static::whereHas('categoria',function($q)
        {
            $q->isLocaleTranslated()->active();
        })->isLocaleTranslated()->active();

        if( $highlighted ) $items->highlighted();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}