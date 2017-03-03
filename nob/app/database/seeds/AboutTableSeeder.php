<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory as Faker;

class AboutTableSeeder extends NobSeeder
{
    public function run()
    {
        $faker = Faker::create();

        $titles = [
            'Nosotros',
            'Misión Visión',
            'La Fábrica',
        ];

        Session::put('translate_language','es');

        foreach( $titles as $title )
        {
            Empresa::createRow([
                'titulo'      => $title,
                'contenido' => $faker->text(200),
                'status'      => 'active'
            ]);
        }
    }
}