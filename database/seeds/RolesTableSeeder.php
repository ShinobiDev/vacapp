<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();

        $rol = new Rol;
        $rol->nombreRol = "Super Admin";
        $rol->save();

        $rol = new Rol;
        $rol->nombreRol = "Administrador";
        $rol->save();

        $rol = new Rol;
        $rol->nombreRol = "Usuario";
        $rol->save();    
    }
}
