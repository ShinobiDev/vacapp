<?php

use Illuminate\Database\Seeder;
use App\Animal;

class AnimalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animal::truncate();

        $animal = new Animal;
        $animal->nua = "111111";
        $animal->nombreAnimal = "Animal 1";
        $animal->raza_id = "1";
        $animal->finca_id = "1";
        $animal->tipo_id = "1";
        $animal->genero_id = "1";
        $animal->peso = "220";
        $animal->fechaNacimiento = "2018-08-02";
        $animal->tipoNacimiento = "1";
        $animal->estado_id = "1";
        $animal->save();

        $animal = new Animal;
        $animal->nua = "2222222";
        $animal->nombreAnimal = "Animal 2";
        $animal->raza_id = "2";
        $animal->finca_id = "2";
        $animal->tipo_id = "2";
        $animal->genero_id = "2";
        $animal->peso = "300";
        $animal->fechaNacimiento = "2018-12-02";
        $animal->tipoNacimiento = "2";
        $animal->valorCompra = "3000000";
        $animal->nombreProveedor = "Francisco Belandia";
        $animal->fechaCompra =  "2019-02-28";
        $animal->estado_id = "1";
        $animal->save();

        $animal = new Animal;
        $animal->nua = "33333";
        $animal->nombreAnimal = "Animal 3";
        $animal->raza_id = "3";
        $animal->finca_id = "3";
        $animal->tipo_id = "1";
        $animal->genero_id = "1";
        $animal->peso = "180";
        $animal->fechaNacimiento = "2017-11-15";
        $animal->tipoNacimiento = "1";
        $animal->estado_id = "1";
        $animal->save();

        $animal = new Animal;
        $animal->nua = "2222222";
        $animal->nombreAnimal = "Animal 4";
        $animal->raza_id = "2";
        $animal->finca_id = "2";
        $animal->tipo_id = "2";
        $animal->genero_id = "2";
        $animal->peso = "300";
        $animal->fechaNacimiento = "2018-02-24";
        $animal->tipoNacimiento = "2";
        $animal->valorCompra = "3000000";
        $animal->nombreProveedor = "Francisco Belandia";
        $animal->fechaCompra =  "2019-02-28";
        $animal->estado_id = "1";
        $animal->save();
    }
}
