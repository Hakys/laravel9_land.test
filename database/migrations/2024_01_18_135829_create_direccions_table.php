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
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->default('Recoge');
            $table->string('telefono');
            $table->string('email')->nullable();
            $table->string('nif')->nullable();
            $table->string('direccion')->default('F. Simplificada, Sin Datos');
            $table->string('cp')->nullable();
            $table->string('poblacion')->default('Huelva');
            $table->string('provincia')->nullable();
            $table->string('pais')->default('España');
            $table->string('distance_text')->nullable();
            $table->integer('distance_value')->nullable();
            $table->string('duration_text')->nullable();
            $table->integer('duration_value')->nullable();
            $table->foreignId('contacto_id')->index();
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
        Schema::dropIfExists('direccions');
    }
};
