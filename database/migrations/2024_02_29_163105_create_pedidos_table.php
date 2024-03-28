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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_cliente", 120);
            $table->string("telefono_cliente", 10);
            $table->string("descripcion");
            $table->string("direccion", 100);
            $table->unsignedBigInteger("id_zona");
            $table->enum("tipo_pedido", ['domicilio', 'enSitio']);
            $table->time("hora_llegada");
            $table->string("cupon", 50);
            $table->float("total");
            $table->timestamps();

            $table->foreign('id_zona')->references('id')->on('zona_domicilios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
