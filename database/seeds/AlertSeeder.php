<?php

use Ikazuchi\Alert;
use Ikazuchi\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AlertSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Alert::create([
            'parameter' => 'temperature',
            'threshold' => '30',
            'client_id' => Client::first()->id,
            'is_active' => true
        ]);

        Alert::create([
            'parameter' => 'water_level',
            'threshold' => '10',
            'client_id' => Client::first()->id,
            'is_active' => true
        ]);

        Alert::create([
            'parameter' => 'humidity',
            'threshold' => '50',
            'client_id' => Client::first()->id,
            'is_active' => true
        ]);
        Model::reguard();
    }
}
