<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('points', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');

            $table->bigInteger('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');

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
        Schema::table('points', function (Blueprint $table) {
          $table->dropForeign('points_location_id_foreign');
          $table->dropColumn('location_id');
        });
    }
}
