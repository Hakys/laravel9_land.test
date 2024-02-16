<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha'); //dia y hora
            $table->string('poblacion')->nullable();
            $table->string('provincia')->nullable();
            $table->boolean('chicas')->default(true);
            $table->boolean('prepago')->default(false);
            $table->integer('n_personas')->default(0);
            $table->float('p_entrada',8,2)->default(0.00);
            $table->float('t_entradas',8,2)->default(0.00);            
            $table->foreignId('direccion_id')->index(); //anfitriona, direccion, poblacion y telefono
            $table->string('estado')->default('SOLICITADA');
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
        Schema::dropIfExists('reunions');
    }
};
