<?php

use Illuminate\Database\Seeder;
use App\Finca;

class FincasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Finca::truncate();

        $finca = new Finca;
        $finca->cliente_id = 2;
        $finca->nombreFinca = "Vista Hermosa";
        $finca->departamento = "Cesar";
        $finca->municipio = "Pailitas";
        $finca->telefono = "3186952889";
        $finca->direccion = "Vereda San José";
        $finca->nombreEncargado = "Pablo Eli Payares";
        $finca->save();

        $finca = new Finca;
        $finca->cliente_id = 2;
        $finca->nombreFinca = "Lucero";
        $finca->departamento = "Cesar";
        $finca->municipio = "Pailitas";
        $finca->telefono = "3186952889";
        $finca->direccion = "Vereda San José";
        $finca->nombreEncargado = "Pablo Eli Payares";
        $finca->save();

        $finca = new Finca;
        $finca->cliente_id = 2;
        $finca->nombreFinca = "La Estrella";
        $finca->departamento = "Cesar";
        $finca->municipio = "Pailitas";
        $finca->telefono = "3186952889";
        $finca->direccion = "Vereda San José";
        $finca->nombreEncargado = "Pablo Eli Payares";
        $finca->save();

        $finca = new Finca;
        $finca->cliente_id = 2;
        $finca->nombreFinca = "El Zancudo";
        $finca->departamento = "Cesar";
        $finca->municipio = "Pailitas";
        $finca->telefono = "3186952889";
        $finca->direccion = "Vereda San José";
        $finca->nombreEncargado = "Pablo Eli Payares";
        $finca->save();

        $finca = new Finca;
        $finca->cliente_id = 2;
        $finca->nombreFinca = "La Marsella";
        $finca->departamento = "Cesar";
        $finca->municipio = "San Martín";
        $finca->telefono = "3186952889";
        $finca->direccion = "Vereda el Bejuco";
        $finca->nombreEncargado = "Pablo Eli Payares";
        $finca->save();
    }
}
