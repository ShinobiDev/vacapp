<?php

use Illuminate\Database\Seeder;
use App\Pais;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::truncate();

        $pais = new Pais;
        $pais->nombrePais = "Colombia";
        $pais->save();

        $pais = new Pais;
        $pais->nombrePais = "Perú";
        $pais->save();

        $pais = new Pais;
        $pais->nombrePais = "Ecuador";
        $pais->save();

        $pais = new Pais;
        $pais->nombrePais = "Argentina";
        $pais->save();
    }
}
