<?php

use Ikazuchi\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'inazuma',
            'email'          => 'admin@inazuma.com',
            'password'       => bcrypt('inazuma11'),
            'remember_token' => str_random(10),
        ]);
    }
}
