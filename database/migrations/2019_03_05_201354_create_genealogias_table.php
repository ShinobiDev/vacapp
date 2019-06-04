<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenealogiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genealogias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('padre_id');
            $table->unsignedInteger('madre_id');
            $table->unsignedInteger('hijo_id');
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
        Schema::dropIfExists('genealogias');
    }
}
