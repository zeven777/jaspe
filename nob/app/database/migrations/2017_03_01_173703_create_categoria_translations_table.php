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
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
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