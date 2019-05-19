<?php

use Illuminate\Database\Seeder;
use App\Raza;

class RazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Raza::truncate();

        $raza = new Raza;
        $raza->nombreRaza = "Cebú";
        $raza->tipo_id = 1;
        $raza->descripcion = "Los cebúes se caracterizan por la presencia de cuernos normalmente cortos, orejas caídas, joroba pronunciada sobre los hombros y amplia papada.";
        $raza->promedioMacho = 20;
        $raza->promedioHembra = 15;
        $raza->save();

        $raza = new Raza;
        $raza->nombreRaza = "Gyr";
        $raza->tipo_id = 1;
        $raza->descripcion = "se considera que las Girs son las más suaves de las razas Zebu.";
        $raza->promedioMacho = 25;
        $raza->promedioHembra = 19;
        $raza->save();

        $raza = new Raza;
        $raza->nombreRaza = "Gyrolando";
        $raza->tipo_id = 1;
        $raza->descripcion = "El Girolando es una raza de ganado originalmente creada en Brasil, que resulta del cruce entre la raza Friesland-Holstein (Bos primigenius taurus ) y la raza Gyr (Bos Bos primigenius indicus).";
        $raza->promedioMacho = 30;
        $raza->promedioHembra = 25;
        $raza->save();
    }
}
