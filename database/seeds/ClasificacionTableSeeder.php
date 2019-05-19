<?php

use Illuminate\Database\Seeder;
use App\Clasificacion;

class ClasificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clasificacion::truncate();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Ternero";
        $clasi->save();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Ternera";
        $clasi->save();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Novillo";
        $clasi->save();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Novilla";
        $clasi->save();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Toro";
        $clasi->save();

        $clasi = new Clasificacion;
        $clasi->nombreClasificacion = "Vaca";
        $clasi->save();
    }
}
