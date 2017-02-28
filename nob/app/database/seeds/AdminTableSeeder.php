<?php

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->delete();

        Admin::createRow(
            array(
                'username' => 'admin',
                'password' => '123456',
                'email' => 'dctrndrk@gmail.com',
                'tipo' => 'sadmin',
                'permisos' => []
            )
        );
    }
}
