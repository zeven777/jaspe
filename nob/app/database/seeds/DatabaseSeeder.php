<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('AdminTableSeeder');

        $this->call('CategoryTableSeeder');

        $this->call('ProductsTableSeeder');

        $this->call('CommentsTableSeeder');

        $this->call('BlogTableSeeder');

        $this->call('StaffTableSeeder');
    }

}
