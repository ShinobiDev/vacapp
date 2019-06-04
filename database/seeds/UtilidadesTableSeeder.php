<?php

use Illuminate\Database\Seeder;
use App\Utilidad;

class UtilidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Utilidad::truncate();

        $util = new Utilidad;
        $util->nombreUtilidad = "Engorde";
        $util->descripcion = "Animales para subir de peso";
        $util->cliente_id = 2;
        $util->save();

        $util = new Utilidad;
        $util->nombreUtilidad = "Ordeño";
        $util->descripcion = "Animales para suministro de leche";
        $util->cliente_id = 2;
        $util->save();
    }
}
