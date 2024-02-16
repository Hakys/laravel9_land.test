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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('referencia')->unique();
            $table->integer('stock')->default(1);
            $table->float('coste',8,2)->default(1);
            $table->float('price',8,2)->default(1);
            $table->float('vat',8,2)->default(21);
            $table->string('title');
            $table->string('slug');
            $table->longText('html_description');
            $table->boolean("new")->default(true);
            $table->boolean("available")->default(true);
            $table->string('url')->nullable();
            $table->string('url_image')->nullable();
            $table->dateTime("released_at")->nullable();
            $table->dateTime("updated_server")->nullable();
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
        Schema::dropIfExists('products');
    }
};
