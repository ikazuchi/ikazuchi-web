<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(PlotSeeder::class);
        $this->call(AlertSeeder::class);

        Model::reguard();
    }
}
