<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muertes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('animal_id');
            $table->unsignedInteger('motivo_id');
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('muertes');
    }
}
