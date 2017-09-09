<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments2', function (Blueprint $table) {
            $table->increments('id2');
            $table->string('comment2');
            $table->integer('article_id2')->unsigned()->index();
            $table->foreign('article_id2')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('user_id2')->unsigned()->index();
            $table->foreign('user_id2')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
