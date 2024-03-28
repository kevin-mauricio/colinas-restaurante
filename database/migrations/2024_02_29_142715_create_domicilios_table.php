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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente',100);
            $table->string('telefono', 12);
            $table->string('direccion', 200);
            $table->string('descripcion',255);
            $table->string('cupon_descuento', 30);
            $table->float('total_pedido');
            $table->float('precio_domicilio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
