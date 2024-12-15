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
        Schema::create('tpvs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('card_number')->nullable();
            $table->string('card_holder')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('cvv')->nullable();
            $table->string('concepto')->default('Artículos Eróticos');
            $table->decimal('amount', 8, 2);
            $table->boolean('pagado')->default(false);
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
        Schema::dropIfExists('tpvs');
    }
};
