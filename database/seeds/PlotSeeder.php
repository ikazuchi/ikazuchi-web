<?php

use Carbon\Carbon;
use Faker\Factory;
use Ikazuchi\Device;
use Ikazuchi\Plot;
use Illuminate\Database\Seeder;

class PlotSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $gen = Factory::create();

            Plot::create([
                'temperature'      => $gen->randomFloat(0, 0, 50),
                'humidity'         => $gen->randomNumber(2),
                'water_level'      => $gen->randomFloat(0, 0, 50),
                'device_timestamp' => Carbon::create()->addHour($i),
                'latitude'         => '14.553695',
                'longitude'        => '121.02541',
                'device_id'        => Device::first()->id
            ]);
        }
    }
}
