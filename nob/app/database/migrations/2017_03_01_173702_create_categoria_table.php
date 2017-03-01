<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('icon', 100);
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
        Schema::drop('categoria');
    }

}