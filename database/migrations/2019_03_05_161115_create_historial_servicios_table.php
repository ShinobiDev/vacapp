<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('animal_id')->nullable();
            $table->unsignedInteger('servicio_id')->nullable();
            $table->unsignedInteger('cliente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_servicios');
    }
}
