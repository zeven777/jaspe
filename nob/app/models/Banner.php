<?php

class Banner extends Base_Banner
{
    protected $with = ['images', 'image','imageText'];

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

    public function getUrl()
    {
        return ! empty($this->url) ? $this->url : 'javascript:;';
    }
}