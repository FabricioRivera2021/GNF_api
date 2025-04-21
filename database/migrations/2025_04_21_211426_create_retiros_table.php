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
      Schema::create('retiros', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');// Customer al que se le retira la medicación
        $table->unsignedBigInteger('tratamiento_id');// Tratamiento del cual se retira medicación, la medicacion se retira de un tratamiento
        $table->date('fecha_retiro');// Fecha en la que se retira
        $table->unsignedInteger('cantidad_cajas');// Cantidad de cajas retiradas
        $table->unsignedBigInteger('user_id')->nullable();// El usuario que registró el retiro (opcional)
        $table->text('observaciones')->nullable();// Notas u observaciones
        $table->timestamps();
        // Relaciones
        $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiros');
    }
};
