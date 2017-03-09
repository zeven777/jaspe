<?php

class Producto extends Base_Producto
{
    protected $with = ['comentario', 'translations','images','image'];

    public static function getProduct($slug)
    {
        return static::whereHas('translations',function($q) use ($slug)
        {
            $q->where('slug', $slug)->notEmpty([
                'nombre',
                'descripcion',
                'caracteristicas',
                'tip'
            ]);
        })->hasImages()->hasImagesText()->active()->first();
    }

    public static function getProducts($paginate = false, $current = null)
    {
        return static::getItems($paginate, false, $current);
    }

    public static function getHighlightedProducts($paginate = false)
    {
        return static::getItems($paginate, true);
    }

    public static function getItems($paginate = false, $highlighted = false, $current = null)
    {
        $items = static::whereHas('categoria',function($q) use ($current)
        {
            $q->isLocaleTranslated()->active();

            if( $current ) $q->whereHas('translations',function($q) use ($current)
            {
                $slug = $current instanceof \Illuminate\Database\Eloquent\Model ? $current->categoria->slug : $current;

                $q->where('slug',$slug);
            });
        })->isLocaleTranslated()->hasImages()->hasImagesText()->active();

        if( $current instanceof \Illuminate\Database\Eloquent\Model ) $items->where('id','<>', $current->getKey());

        if( $highlighted ) $items->highlighted();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }

    public function getBackgroundColor()
    {
        return ! empty( $this->color ) ? $this->color : '#fff0e1';
    }
}