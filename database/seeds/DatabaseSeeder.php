<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FincasTableSeeder::class);
        $this->call(RazasTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(ContinentesTableseeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(MotivosMovimientosTableSeeder::class);
        $this->call(UtilidadesTableSeeder::class);
        $this->call(EstadosAnimalesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TarifasTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
    }
}
