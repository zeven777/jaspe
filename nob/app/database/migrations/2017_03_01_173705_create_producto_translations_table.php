<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_translations', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('producto_id')->unsigned();
            $table->string('locale', 20);
            $table->string('slug', 255);
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->text('caracteristicas');
            $table->text('tip');
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->unique(['producto_id','locale']);
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
        Schema::drop('producto_translations');
    }

}