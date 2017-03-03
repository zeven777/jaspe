<?php

class Empresa extends Base_Empresa
{
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