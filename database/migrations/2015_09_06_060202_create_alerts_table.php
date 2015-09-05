<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('parameter',['temperature', 'humidity', 'water_level']);
            $table->string('threshold');
            $table->boolean('is_active');
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
        Schema::table('alerts', function(Blueprint $table) {
            $table->dropForeign('alerts_client_id_foreign');
            $table->drop();
        });
    }
}
