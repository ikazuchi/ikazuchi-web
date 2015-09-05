<?php

use Ikazuchi\Client;
use Ikazuchi\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'serial_no' => 'NODE_1',
            'uuid'      => 'abcde',
            'client_id' => Client::first()->id
        ]);
    }
}
