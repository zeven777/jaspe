<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory;

class BannerTableSeeder extends NobSeeder
{
    public function run()
    {
        $n = 3;

        $faker = new Factory();

        for( $i = 1; $i <= $n; $i++ )
        {
            $model = Banner::createRow([
                'titulo' => $faker->text()
            ]);

            if( $model->model )
            {
                $this->generateFiles(1,1334,897,$faker,$model);
            }
        }
    }
}