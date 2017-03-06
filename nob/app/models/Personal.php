<?php

class Personal extends Base_Personal
{
    public static function getStaff()
    {
        return static::getItems();
    }

    public static function getItems($paginate = false)
    {
        $items = static::notEmpty(['nombre', 'lugar', 'email', 'telefono'])->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}