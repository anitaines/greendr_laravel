<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('name');
            $table->string('nomenclature')->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('on');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->bigInteger('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('id')->on('points');

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
        Schema::table('articles', function (Blueprint $table) {
          $table->dropForeign('articles_user_id_foreign');
          $table->dropColumn('user_id');

          $table->dropForeign('articles_category_id_foreign');
          $table->dropColumn('category_id');

          $table->dropForeign('articles_point_id_foreign');
          $table->dropColumn('point_id');
        });
    }
}
