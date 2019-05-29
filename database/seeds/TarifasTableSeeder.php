<?php

use Illuminate\Database\Seeder;
use App\Tarifa;

class TarifasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	Tarifa::truncate();

        $tarifa = new Tarifa;
        $tarifa->nombreTarifa = "Basica";
        $tarifa->valorTarifa = 50000;
        $tarifa->save();

        $tarifa = new Tarifa;
        $tarifa->nombreTarifa = "Emprendedor";
        $tarifa->valorTarifa = 80000;
        $tarifa->save();

        $tarifa = new Tarifa;
        $tarifa->nombreTarifa = "Pyme";
        $tarifa->valorTarifa = 100000;
        $tarifa->save();
    }
}
