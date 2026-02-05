<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla que contendra los medicamentos como productos donde convergen distintas caracteristicas de otras tablas
     */
    public function up(): void
    {
      Schema::create('medicamentos', function (Blueprint $table) {
          $table->id();

          $table->string('nombre_comercial');

          // $table->unsignedBigInteger('droga_id');
          $table->unsignedBigInteger('laboratorio_id');
          $table->unsignedBigInteger('presentacion_id');
          // $table->unsignedBigInteger('concentracion_id');
          $table->unsignedBigInteger('via_administracion_id');

          $table->boolean('requiere_receta')->default(false);
          $table->boolean('requiere_refrigeracion')->default(false);
          $table->boolean('es_ranurable')->default(false);

          $table->foreignId('categoria_id')->constrained();

          $table->string('codigo_barra')->nullable();
          // $table->string('registro_msp')->nullable();

          $table->boolean('activo')->default(true);

          $table->timestamps();

          //references
          // $table->foreign('droga_id')->references('id')->on('drugs')->onDelete('cascade');
          $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
          $table->foreign('presentacion_id')->references('id')->on('presentaciones')->onDelete('cascade');
          // $table->foreign('concentracion_id')->references('id')->on('concentraciones')->onDelete('cascade');
          $table->foreign('via_administracion_id')->references('id')->on('via_administracions')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
