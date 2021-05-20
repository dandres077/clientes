<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'David', 
        	'last' => 'C', 
        	'email' => 'admin@gmail.com', 
        	'password' => bcrypt('123456')
        ]);

        User::create([
        	'name' => 'Andres', 
        	'last' => 'C', 
        	'email' => 'user1@gmail.com', 
        	'password' => bcrypt('123456')
        ]);

        User::create([
        	'name' => 'Camilo', 
        	'last' => 'C', 
        	'email' => 'user2@gmail.com', 
        	'password' => bcrypt('123456')
        ]);

    }
}
