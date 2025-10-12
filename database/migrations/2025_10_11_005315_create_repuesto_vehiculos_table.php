<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repuesto_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repuesto_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('repuesto_id')->references('id')->on('repuestos');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuesto_vehiculos');
    }
};
