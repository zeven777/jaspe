<?php

class Categoria extends Base_Categoria
{
    protected $with = ['translations','images','image'];

    public static function getCategories()
    {
        return static::getItems();
    }

    public static function getItems($paginate = false)
    {
        $items = static::whereHas('producto',function($q)
        {
            $q->isLocaleTranslated()->hasImages()->hasImagesText()->active();
        })->isLocaleTranslated()->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}