<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->string('slug', 255);
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->text('caracteristicas');
            $table->text('tip');
            $table->bigInteger('ordered')->unsigned()->default(999999999999999999);
            $table->enum('highlighted', array('yes','no'))->default('no')->index();
            $table->string('status', 100)->default('inactive')->index();
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('producto')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentario');
    }

}