<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory as Faker;

class BlogTableSeeder extends NobSeeder
{
    public function run()
    {
        $faker = Faker::create();

        Session::put('translate_language','es');

        for( $i = 1; $i <= 3; $i++ )
        {
            $model = Blog::createRow([
                'titulo'    => $faker->sentence(8),
                'contenido' => '<p>' . $faker->text(200) . '</p>'
                             . '<p>' . $faker->text(200) . '</p>',
                'status'    => 'active'
            ]);

            if( $model->model instanceof \Nob\Admin\Model\NobBase )
            {
                $this->generateFiles(1,400,400,$faker,$model->model, 'jpg' , public_path("img/2x/bl{$i}.jpg"));
            }
        }
    }
}