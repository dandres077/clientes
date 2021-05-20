<?php

use Illuminate\Database\Seeder;
use App\Clients;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clients::create([
            'city_id' => 1,
        	'name' => 'Mazda'        	
        ]);

        Clients::create([
            'city_id' => 2,
        	'name' => 'Renault'        	
        ]);

        Clients::create([
            'city_id' => 3,
        	'name' => 'Mercedez'        	
        ]);

        Clients::create([
            'city_id' => 4,
        	'name' => 'Kia'        	
        ]);

        Clients::create([
            'city_id' => 5,
        	'name' => 'Toyota'        	
        ]);

        Clients::create([
            'city_id' => 6,
        	'name' => 'Ferrari'        	
        ]);
    }
}
