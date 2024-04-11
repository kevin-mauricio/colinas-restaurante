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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_zone');
            $table->string('name', 80);
            $table->string('phone', 15)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('coupon')->nullable();
            $table->enum('type', ['delivery', 'site']);
            $table->float('total')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_zone')->references('id')->on('zones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
