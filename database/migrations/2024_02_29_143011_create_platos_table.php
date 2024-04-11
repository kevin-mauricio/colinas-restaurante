<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_plato", 100);
            $table->unsignedBigInteger("id_categoria");
            $table->string('descripcion');
            $table->float("precio");
            $table->float("costo");
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
