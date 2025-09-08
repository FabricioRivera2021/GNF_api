<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Plan de retiros de medicación para un tratamiento específico.
     */
    public function up(): void
    {
      Schema::create('plan_retiros', function (Blueprint $table) {
        $table->id(); 

        $table->unsignedBigInteger('id_tratamiento');
        $table->unsignedBigInteger('nro_retiro');// Número secuencial del retiro dentro del tratamiento
        // $table->unsignedBigInteger('id_retiro');
        $table->date('fecha_programada');// Fecha en la que se programa el retiro
        $table->date('fecha_limite');// Fecha en la que se realiza el retiro
        $table->date('fecha_retiro_real')->nullable();// Fecha en la que se realiza el retiro, null si no se ha realizado
        $table->enum('estado', ['pendiente', 'completado', 'caducado', 'retiro_fuera_fecha'])->default('pendiente');// Estado del retiro
        $table->string('motivo_fuera_fecha')->nullable();// Motivo por el cual el retiro se realizó fuera de la fecha programada
        $table->unsignedBigInteger('id_user');// Usuario que creó el plan de retiros
        $table->unsignedBigInteger('id_user_retiro')->nullable();// Usuario que realizó el retiro, null si no se ha realizado
        $table->unsignedInteger('cantidad_cajas');// Cantidad de cajas retiradas
        $table->text('observaciones')->nullable();// Notas u observaciones
        $table->decimal('monto', 10, 2)->nullable(); // Monto total del retiro, null si no aplica
        $table->timestamps();
        // Relaciones
        $table->foreign('id_tratamiento')->references('id')->on('tratamientos')->onDelete('cascade');
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_user_retiro')->references('id')->on('users')->onDelete('cascade');
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
