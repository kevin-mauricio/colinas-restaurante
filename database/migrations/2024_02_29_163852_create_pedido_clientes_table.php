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
        Schema::create('pedidos_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pedido");
            $table->unsignedBigInteger("id_plato");
            $table->timestamps();

            $table->foreign('id_plato')->references('id')->on('platos');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_clientes');
    }
};
