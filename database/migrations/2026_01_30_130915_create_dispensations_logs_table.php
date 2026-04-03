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
        Schema::create('dispensations_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dispensation_id');
            $table->unsignedBigInteger('user_id');
            $table->string('estado_anterior');
            $table->string('nuevo_estado');
            $table->date('fecha_cambio');
            $table->enum('motivo_cambio', [
              'actualizacion_normal_sistema',
              'pausado_por_usuario',
              'cancelado_por_usuario',
              'otro'
            ]);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensations_logs');
    }
};
