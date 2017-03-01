<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('email', 255);
            $table->string('tipo', 2048)->default('user')->nullable();
            $table->text('permisos');
            $table->bigInteger('ordered')->unsigned()->default(999999999999999999);
            $table->enum('highlighted', array('yes','no'))->default('no')->index();
            $table->string('status', 100)->default('inactive')->index();
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }

}