<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_translations', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('banner_id')->unsigned();
            $table->string('locale', 20);
            $table->string('titulo', 1024);
            $table->timestamp('created_at')->default('1970-01-01 00:00:01');
            $table->timestamp('updated_at')->default('1970-01-01 00:00:01');
            $table->unique(['banner_id','locale']);
            $table->foreign('banner_id')
                  ->references('id')
                  ->on('banner')
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
        Schema::drop('banner_translations');
    }

}