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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('concepto');
            $table->float('importe',8,2);
            $table->dateTime("fecha");
            $table->string('metodo');
            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id')->references('id')->on('reunions')->onDelete('cascade');
            $table->unsignedBigInteger('contacto_id');
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
};
