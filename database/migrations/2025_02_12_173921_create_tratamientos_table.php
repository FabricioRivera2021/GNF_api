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
            $table->unsignedBigInteger('tto_dias_mes');
            $table->unsignedBigInteger('medicos_id');
            $table->unsignedBigInteger('medication_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('activo');
            $table->unsignedBigInteger('total_tto_dias');
            $table->unsignedBigInteger('total_tto_dias_pendientes');
            $table->unsignedBigInteger('retiros_por_mes');
            $table->unsignedBigInteger('retiros_pendientes');
            $table->enum('tipo_tto', ['cronico', 'agudo', 'FNR', 'compra_especial']);
            $table->timestamps();
            $table->foreign('medicos_id')->references('id')->on('medicos')
            ->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')
            ->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
