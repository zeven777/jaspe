<?php

use Nob\Admin\Seeder\NobSeeder;

class CategoryTableSeeder extends NobSeeder
{
    public function run()
    {
        $icons = [
            'bano'      => 'Baño',
            'cocina'    => 'Cocina',
            'industria' => 'Industria',
            'metales'   => 'Metales',
            'extras'    => 'Extras',
        ];

        Session::put('translate_language','es');

        foreach( $icons as $icon => $name )
        {
            Categoria::createRow([
                'icon'   => $icon,
                'nombre' => $name
            ]);
        }
    }
}