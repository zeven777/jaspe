<?php

class Contacto extends Base_Contacto
{
    protected $with = ['images','image'];

    public static function getContact()
    {
        return static::hasImages()->notEmpty([
            'titulo', 'contenido', 'latitude', 'longitude', 'zoom'
        ])->active()->first();
    }

    public static function getItems($paginate = false)
    {
        $items = static::hasImages()->notEmpty(['titulo', 'contenido', 'latitude', 'longitude','zoom'])->active();

        $items = $paginate ? $items->paginate($paginate) : $items->get();

        return $items;
    }

    public function getGoogleMapsStaticUrl()
    {
        return 'https://maps.googleapis.com/maps/api/staticmap?'
            . 'center=' . $this->latitude . ',' . $this->longitude
            . '&zoom=' . $this->zoom
            . '&size=684x456'
            . '&markers=icon:' . url('http://190.206.26.97/jaspe/img/map-jaspe.png')
            . '%7C%7C' . $this->latitude . ',' . $this->longitude
            . '&key=' . p_config('api.google.maps.key');
    }
}