<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_translations', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('empresa_id')->unsigned();
            $table->string('locale', 20);
            $table->string('slug', 255);
            $table->string('titulo', 255)->index();
            $table->text('contenido');
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->unique(['empresa_id','locale']);
            $table->foreign('empresa_id')
                  ->references('id')
                  ->on('empresa')
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
        Schema::drop('empresa_translations');
    }

}