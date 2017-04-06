<?php

class OG
{
    protected $attributes = [];

    private $lang;

    public function __construct($lang = 'es')
    {
        $this->lang = $lang;

        $this->setAttribute('title', p_config('app.project'));

        $this->setAttribute('description', p_system('description',$lang));

        $this->setAttribute('type', 'article');

        $this->setAttribute('image', url('img/logo.png'));

        $this->setAttribute('url', route('home'));

        $this->setAttribute('siteName', p_config('app.name'));
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttribute($name)
    {
        return $this->attributes["og{$name}"];
    }

    public function setAttribute($name, $value)
    {
        if( in_array($name,['keywords','description']) )
        {
            app('config')->set('system.description.' . $this->lang, $value);
        }

        $this->attributes["og{$name}"] = $value;
    }

    public function __get($name)
    {
        if( $name === 'all' ) return $this->getAttributes();

        return $this->getAttribute($name);
    }

    public function __set($name, $value)
    {
        $this->setAttribute($name, $value);
    }
}