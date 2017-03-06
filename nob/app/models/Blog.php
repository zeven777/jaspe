<?php

class Blog extends Base_Blog
{
    protected $with = ['translations','images','image'];

    public static function getBlogs($paginate = false)
    {
        return static::getItems($paginate);
    }

    public static function getItems($paginate = false)
    {
        $items = static::active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}