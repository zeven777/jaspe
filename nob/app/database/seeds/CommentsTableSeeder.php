<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends NobSeeder
{
    public function run()
    {
        $faker = Faker::create();

        Session::put('translate_language','es');

        $products = Producto::isLocaleTranslated()->active()->get();

        foreach( $products as $product )
        {
            for( $i = 0; $i < 2; $i++ )
            {
                Comentario::createRow([
                    'producto'        => $product->getKey(),
                    'nombre'          => $faker->firstName() . ' ' . $faker->lastName(),
                    'comentario'      => $faker->text(100),
                    'rank'            => rand(1,5),
                    'status'          => 'active'
                ]);
            }
        }
    }
}