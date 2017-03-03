<?php

class Categoria extends Base_Categoria
{
    public static function getCategories()
    {
        return static::getItems();
    }

    public static function getItems($paginate = false)
    {
        $items = static::whereHas('producto',function($q)
        {
            $q->isLocaleTranslated()->hasImages()->active();
        })->isLocaleTranslated()->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}