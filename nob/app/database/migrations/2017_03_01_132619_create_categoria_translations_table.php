<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_translations', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('categoria_id')->unsigned();
            $table->string('locale', 20);
            $table->string('slug', 255);
            $table->string('nombre', 255);
            $table->timestamps();
            $table->unique(['categoria_id','locale']);
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria')
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
        Schema::drop('categoria_translations');
    }

}