<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->unsignedBigInteger('post_user_id');
            $table->foreign('post_user_id')->references('user_id')->on('users');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('body');
            $table->string('picture_url')->nullable();
            $table->string('picture_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function ($table){
            $table->dropForeign('posts_post_user_id_foreign');
        });
        Schema::dropIfExists('posts');
    }
}
