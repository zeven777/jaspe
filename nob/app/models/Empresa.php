<?php

class Empresa extends Base_Empresa
{
    protected $with = ['translations','images','image'];

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
        $items = static::getItems();

        if( $items->count() > 0 )
        {
            $items = $items->filter(function($i)
            {
                return (bool) ($i->getTranslation()->slug !== 'vision');
            });

            foreach($items as $item)
            {
                if($item->getTranslation()->slug === 'mision') $item->getTranslation()->titulo .= ' y Visi&oacute;n';
            }
        }

        return $items;
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