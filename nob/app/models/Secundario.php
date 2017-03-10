<?php

class Secundario extends Base_Secundario
{
    protected $with = ['images','image'];

    public static function getBanner($section)
    {
        return static::where('seccion',$section)->hasImages()->active()->random()->first();
    }

    public static function getItems($paginate = false)
    {
        $items = static::active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}