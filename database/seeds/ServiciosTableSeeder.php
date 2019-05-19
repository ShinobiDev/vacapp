<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Servicio::truncate();

        $servicio = new Servicio;
        $servicio->nombreServicio = "Baño";
        $servicio->descripcion = "Baño con ducha del animal";
        $servicio->save();

        $servicio = new Servicio;
        $servicio->nombreServicio = "Vacuna contra la Aftosa";
        $servicio->descripcion = "Vacuna oleosa concentrada para prevenir la Fiebre Aftosa en bovinos.";
        $servicio->save();
    }
}
