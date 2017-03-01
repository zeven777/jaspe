<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_translations', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('blog_id')->unsigned();
            $table->string('locale', 20);
            $table->string('slug', 1024);
            $table->string('titulo', 1024);
            $table->text('contenido');
            $table->string('tag', 2048);
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->unique(['blog_id','locale']);
            $table->foreign('blog_id')
                  ->references('id')
                  ->on('blog')
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
        Schema::drop('blog_translations');
    }

}