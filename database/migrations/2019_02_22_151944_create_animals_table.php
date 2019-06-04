<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nua')->nullable();
            $table->string('nombreAnimal');
            $table->unsignedInteger('madre_id')->nullable();
            $table->unsignedInteger('padre_id')->nullable();
            $table->string('nuaPadre')->nullable();
            $table->string('nombrePadre')->nullable();
            $table->string('nuaMadre')->nullable();
            $table->string('nombreMadre')->nullable();
            $table->unsignedInteger('raza_id');
            $table->unsignedInteger('finca_id');
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('genero_id');
            $table->unsignedInteger('cliente_id');
            $table->decimal('peso');
            $table->decimal('pesoNacimiento')->nullable();
            $table->date('fechaNacimiento');
            $table->string('tipoNacimiento');
            $table->string('valorCompra')->nullable();
            $table->string('nombreProveedor')->nullable();
            $table->date('fechaCompra')->nullable();
            $table->unsignedInteger('estado_id')->nullable();
            $table->integer('hijos')->nullable();
            $table->unsignedInteger('motivoMuerte_id')->nullable();
            $table->date('fechaMuerte')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
