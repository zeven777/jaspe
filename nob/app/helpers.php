<?php

if( ! function_exists('get_user') )
{
    function get_user()
    {
        return app('session')->get('WEBUSER');
    }
}

if( ! function_exists('retina_url') )
{
    function retina_url($folder, $name, $retina = 1)
    {
        $urls = [];

        for($n = 1; $n <= $retina; $n++)
        {
            $parts = [$folder];

            if($n > 1) $parts[] = "{$n}x";

            $parts[] = $name;

            $urls[] = url( implode('/', $parts) ) . " {$n}x";
        }

        return implode(', ', $urls);
    }
}