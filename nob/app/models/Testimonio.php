<?php

class Testimonio extends Base_Testimonio
{
    protected $with = ['images','image'];

    public static function getTestimonials($paginate = false)
    {
        return static::getItems($paginate);
    }

    public static function getItems($paginate = false)
    {
        $items = static::hasImages()->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}