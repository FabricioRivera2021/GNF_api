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
        Schema::create('concentraciones', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('unidad_numerador')->constrained('unidades');
          $table->unsignedBigInteger('unidad_denominador')->nullable()->constrained('unidades');
          $table->string('descripcion')->nullable();
          $table->timestamps();

          $table->unique(['unidad_numerador', 'unidad_denominador'])->name('unidad_concentracion');

          $table->foreign('unidad_numerador')->references('id')->on('unidades')->onDelete('cascade');
          $table->foreign('unidad_denominador')->references('id')->on('unidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Concentraciones');
    }
};
