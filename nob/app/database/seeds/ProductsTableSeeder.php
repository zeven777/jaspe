<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends NobSeeder
{
    public function run()
    {
        $faker = Faker::create();

        Session::put('translate_language','es');

        $categories = Categoria::isLocaleTranslated()->active()->get();

        foreach( $categories as $category )
        {
            for( $i = 0; $i < 5; $i++ )
            {
                $product = Producto::createRow([
                    'categoria'       => $category->getKey(),
                    'nombre'          => $faker->sentence(3),
                    'descripcion'     => $faker->text(200),
                    'caracteristicas' => '<p><strong>'.$faker->sentence(2).'</strong><br /> '.$faker->text(100).'</p>'
                                        .'<p><strong>'.$faker->sentence(2).'</strong><br /> '.$faker->text(100).'</p>',
                    'tip'             => $faker->text(100),
                    'status'          => 'active'
                ]);

                if( $product->model instanceof \Nob\Admin\Model\NobBase )
                {
                    $this->generateFiles(1,400,400,$faker,$product->model);
                }
            }
        }
    }
}