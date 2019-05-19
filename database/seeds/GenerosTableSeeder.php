<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::truncate();

        $genero = new Genero;
        $genero->nombreGenero = "Macho";
        $genero->save();

        $genero = new Genero;
        $genero->nombreGenero = "Hembra";
        $genero->save();
    }
}
