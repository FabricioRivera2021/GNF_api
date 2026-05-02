<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla que contendra los medicamentos como productos donde convergen distintas caracteristicas de otras tablas
     */

    /**
     * faltaria [
     * PRESENTACION -> TABLETAS, CAPSULAS, COMPRIMIDOS, SOLUCION, CREMA 
     * CONTENIDO -> 20 COMPRIMIDOS, 500 ML, 50 Gr
     * CONTENIDO_POR_UNIDAD -> null solo para el caso de comprimidos, EJ: 50mg por comprimido
     * ]
     *  */
    public function up(): void
    {
      Schema::create('medicamentos', function (Blueprint $table) {
          $table->id();
          $table->string('nombre_comercial');
          $table->unsignedBigInteger('laboratorio_id');
          $table->unsignedBigInteger('presentacion_id');
          $table->unsignedBigInteger('via_administracion_id');
          $table->unsignedBigInteger('unidad_base_id');
          $table->boolean('requiere_receta')->default(false);
          $table->boolean('requiere_refrigeracion')->default(false);
          $table->boolean('es_ranurable')->default(false);
          $table->foreignId('categoria_id')->constrained();
          $table->string('codigo_barra')->nullable();
          $table->boolean('activo')->default(true);
          $table->decimal('contenido', 10, 2);
          $table->decimal('contenido_por_unidad', 10, 2)->nullable();
          $table->boolean('tiene_contenido_x_unidad')->default(false);
          $table->timestamps();

          //references
          $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
          $table->foreign('presentacion_id')->references('id')->on('presentaciones')->onDelete('cascade');
          $table->foreign('via_administracion_id')->references('id')->on('via_administracions')->onDelete('cascade');
          $table->foreign('unidad_base_id')->references('id')->on('unidades')->onDelete('cascade');
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
