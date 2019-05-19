<?php

use Illuminate\Database\Seeder;
use App\Tipo;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Tipo::truncate();

        $tipo = new Tipo;
        $tipo->nombreTipo = "Res";
        $tipo->descripcion = "Descripcion Uno";
        $tipo->save();

        $tipo = new Tipo;
        $tipo->nombreTipo = "Caballo";
        $tipo->descripcion = "Descripcion Dos";
        $tipo->save();

        $tipo = new Tipo;
        $tipo->nombreTipo = "Ovino";
        $tipo->descripcion = "Descripcion Tres";
        $tipo->save();
    }
}
