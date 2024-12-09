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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('distance_text')->nullable();
            $table->integer('distance_value')->nullable();
            $table->string('duration_text')->nullable();
            $table->integer('duration_value')->nullable();
            $table->unsignedBigInteger('origen');
            $table->foreign('origen')->references('id')->on('direccions')->onDelete('cascade');
            $table->unsignedBigInteger('destino');
            $table->foreign('destino')->references('id')->on('direccions')->onDelete('cascade');
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
        Schema::dropIfExists('rutas');
    }
};
