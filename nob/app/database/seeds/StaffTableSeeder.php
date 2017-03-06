<?php

use Nob\Admin\Seeder\NobSeeder;
use Faker\Factory as Faker;

class StaffTableSeeder extends NobSeeder
{
    public function run()
    {
        $faker = Faker::create();

        Session::put('translate_language','es');

        for( $i = 1; $i <= 4; $i++ )
        {
            $firstName = $faker->firstName('female');

            $lastName = $faker->lastName();

            Personal::createRow([
                'nombre'   => "{$firstName} {$lastName}",
                'lugar'    => 'En ' . $faker->country(),
                'email'    => strtolower("{$firstName}-{$lastName}@gmail.com"),
                'telefono' => $faker->tollFreePhoneNumber(),
                'status'   => 'active'
            ]);
        }
    }
}