<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlotsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('temperature');
            $table->string('humidity');
            $table->string('water_level');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamp('device_timestamp');
            $table->integer('device_id', false, true);
            $table->foreign('device_id')->references('id')->on('devices');
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
        Schema::table('plots', function (Blueprint $table) {
            $table->dropForeign('plots_device_id_foreign');
            $table->drop();
        });
    }
}
