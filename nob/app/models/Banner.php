<?php

class Banner extends Base_Banner
{
    protected $with = ['images', 'image'];

    public static function getBanner()
    {
        return static::hasImages()->active()->random()->first();
    }

    public static function getItems($paginate = false)
    {
        $items = static::active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}