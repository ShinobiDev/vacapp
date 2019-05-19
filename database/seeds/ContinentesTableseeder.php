<?php

use Illuminate\Database\Seeder;
use App\Continente;

class ContinentesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Continente::truncate();

        $continente = new Continente;
        $continente->nombreContinente = "Unión Europea";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "Resto de Europa";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "Africa";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "America del Norte";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "Centro America y Caribe";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "Sudamerica";
        $continente->save();

        $continente = new Continente;
        $continente->nombreContinente = "Oceania";
        $continente->save();

    }
}
