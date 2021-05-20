<?php

use Illuminate\Database\Seeder;
use App\Cities;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cities::create(['name' => ' Leticia']);
		Cities::create(['name' => ' Medellín']);
		Cities::create(['name' => ' Arauca']);
		Cities::create(['name' => ' Barranquilla']);
		Cities::create(['name' => ' Cartagena de Indias']);
		Cities::create(['name' => ' Tunja']);
		Cities::create(['name' => ' Manizales']);
		Cities::create(['name' => ' Florencia']);
		Cities::create(['name' => ' Yopal']);
		Cities::create(['name' => ' Popayán']);
		Cities::create(['name' => ' Valledupar']);
		Cities::create(['name' => ' Quibdó']);
		Cities::create(['name' => ' Montería']);
		Cities::create(['name' => ' Bogotá']);
		Cities::create(['name' => ' Inírida']);
		Cities::create(['name' => ' San José del Guaviare']);
		Cities::create(['name' => ' Neiva']);
		Cities::create(['name' => ' Riohacha']);
		Cities::create(['name' => ' Santa Marta']);
		Cities::create(['name' => ' Villavicencio']);
		Cities::create(['name' => ' San Juan de Pasto']);
		Cities::create(['name' => ' San José de Cúcuta']);
		Cities::create(['name' => ' Mocoa']);
		Cities::create(['name' => ' Armenia']);
		Cities::create(['name' => ' Pereira']);
		Cities::create(['name' => ' San Andrés']);
		Cities::create(['name' => ' Bucaramanga']);
		Cities::create(['name' => ' Sincelejo']);
		Cities::create(['name' => ' Ibagué']);
		Cities::create(['name' => ' Cali']);
		Cities::create(['name' => ' Mitú']);
		Cities::create(['name' => ' Puerto Carreño']);

    }
}
