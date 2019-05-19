<?php

use Illuminate\Database\Seeder;
use App\MotivoMovimiento;

class MotivosMovimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoMovimiento::truncate();

        $motivo = new MotivoMovimiento;
        $motivo->nombreMotivo = "Destete";
        $motivo->save();

        $motivo = new MotivoMovimiento;
        $motivo->nombreMotivo = "Feria";
        $motivo->save();

        $motivo = new MotivoMovimiento;
        $motivo->nombreMotivo = "Embarazo";
        $motivo->save();

        $motivo = new MotivoMovimiento;
        $motivo->nombreMotivo = "Pastos";
        $motivo->save();
    }
}