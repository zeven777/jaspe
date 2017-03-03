<?php

class Empresa extends Base_Empresa
{
    protected $with = ['translations'];

    public static function getFirstAbout()
    {
        return static::isLocaleTranslated()->hasImages()->highlighted()->active()->first();
    }

    public static function getAllAbouts()
    {
        return static::isLocaleTranslated()->hasImages()->unhighlighted()->active()->get();
    }

    public static function getEnterprises()
    {
        return static::getItems();
    }

    public static function getItems($paginate = false)
    {
        $items = static::whereHas('translations', function($q)
        {
            $q->notEmpty(['titulo','contenido']);
        })->isLocaleTranslated()->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}