<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function(Blueprint $table)
        {
            $table->bigInteger('id_form')->unsigned()->index();
            $table->string('form', 100)->index();
            $table->string('name', 255)->index();
            $table->integer('size')->unsigned();
            $table->string('foot', 1024);
            $table->enum('type', array('image','file'))->default('image');
            $table->string('text', 10)->default('no')->index();
            $table->enum('highlighted', array('yes','no'))->default('no');
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->primary('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('file');
    }

}
