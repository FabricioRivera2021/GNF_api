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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('medicos_id');
            $table->unsignedBigInteger('medication_id');
            $table->timestamps();
            $table->unsignedBigInteger('total_tto');
            $table->unsignedBigInteger('retiros_pendientes');
            $table->unsignedBigInteger('retiros_por_mes');
            $table->foreign('medicos_id')->references('id')->on('medicos')
            ->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};
