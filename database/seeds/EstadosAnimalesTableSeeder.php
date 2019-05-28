<?php

use Illuminate\Database\Seeder;
use App\EstadoAnimal;

class EstadosAnimalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoAnimal::truncate();

        $estado = new EstadoAnimal;
        $estado->nombreEstado = "Activo";
        $estado->save();

        $estado = new EstadoAnimal;
        $estado->nombreEstado = "Vendido";
        $estado->save();

        $estado = new EstadoAnimal;
        $estado->nombreEstado = "Enfermo";
        $estado->save();

        $estado = new EstadoAnimal;
        $estado->nombreEstado = "Muerto";
        $estado->save();
    }
}
