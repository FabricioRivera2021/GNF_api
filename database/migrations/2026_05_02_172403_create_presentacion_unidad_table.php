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
        Schema::create('presentacion_unidad', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('presentacion_id');
            $table->unsignedBigInteger('unidad_id');

            $table->foreign('presentacion_id')->references('id')->on('presentaciones')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');

            // opcional pero recomendable: evitar duplicados
            $table->unique(['presentacion_id', 'unidad_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentacion_unidad');
    }
};
