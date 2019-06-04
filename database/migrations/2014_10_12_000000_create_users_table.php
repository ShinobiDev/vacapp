<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('documento');
            $table->string('password');
            $table->date('fechaSuscripcion')->nullable();
            $table->integer('telefono')->nullable();
            $table->unsignedInteger('rol_id')->nullable();
            $table->unsignedInteger('estado_id');
            $table->unsignedInteger('finca_id')->nullable();
            $table->unsignedInteger('tarifa_id')->nullable();
            $table->unsignedInteger('cliente_id')->nullable();
            $table->unsignedInteger('tipoUsuario_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
