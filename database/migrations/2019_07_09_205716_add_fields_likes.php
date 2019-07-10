<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
          $table->bigInteger('article_id')->unsigned();
          $table->foreign('article_id')->references('id')->on('articles');

          $table->bigInteger('user_likeador_id')->unsigned();
          $table->foreign('user_likeador_id')->references('id')->on('users');

          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
          $table->dropForeign('likes_article_id_foreign');
          $table->dropColumn('article_id');

          $table->dropForeign('likes_user_likeador_id_foreign');
          $table->dropColumn('user_likeador_id');
        });
    }
}
