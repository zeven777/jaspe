<?php

class BlogTranslation extends Base_BlogTranslation
{
    public static function getItems($paginate = false)
    {
        $items = static::active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}