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
        Schema::create('dispensations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('treatment_id')->nullable();
            $table->date('creation_date');
            $table->enum('estado', [
              'en_ventanilla', 
              'en_preparacion',
              'listo_para_retirar',
              'entregado',
              'pausado',
              'cancelado'
            ]);
            $table->string('motivo_estado')->nullable();
            $table->string('estado_actual')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensations');
    }
};
