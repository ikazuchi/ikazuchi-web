<?php

use Ikazuchi\Client;
use Ikazuchi\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'user_id'       => User::first()->id,
            'name'          => 'Inazuma',
            'mobile_number' => '09178436703'
        ]);
    }
}
