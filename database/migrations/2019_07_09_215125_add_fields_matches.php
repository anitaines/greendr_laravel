<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->decimal('calification1', 1, 1);
            $table->decimal('calification2', 1, 1);

            $table->bigInteger('article1_id')->unsigned();
            $table->foreign('article1_id')->references('id')->on('articles');

            $table->bigInteger('article2_id')->unsigned();
            $table->foreign('article2_id')->references('id')->on('articles');

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
        Schema::table('matches', function (Blueprint $table) {
          $table->dropForeign('matches_article1_id_foreign');
          $table->dropColumn('article1_id');

          $table->dropForeign('matches_article2_id_foreign');
          $table->dropColumn('article2_id');
        });
    }
}
