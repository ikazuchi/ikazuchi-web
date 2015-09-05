<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_no');
            $table->string('uuid')->unique();
            $table->integer('client_id', false, true);
            $table->foreign('client_id')->references('id')->on('devices');
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

        Schema::table('devices', function(Blueprint $table) {
            $table->dropForeign('devices_client_id_foreign');
            $table->drop();
        });
    }
}
