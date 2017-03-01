<?php

class EmpresaTranslation extends Base_EmpresaTranslation
{
    public static function getItems($paginate = false)
    {
        $items = static::active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }
}