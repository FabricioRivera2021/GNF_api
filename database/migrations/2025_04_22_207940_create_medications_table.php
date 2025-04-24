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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('lote');
            $table->date('fecha_vencimiento');
            $table->string('droga');
            $table->string('droga_concentracion');
            $table->string('nombre_comercial');
            $table->string('unidades_caja');
            $table->enum('receta', [
                'Si',
                'No',
            ]);
            $table->enum('refrigeracion', [
                'Si',
                'No',
            ]);
            $table->enum('estado', [
                'Activo',
                'Inactivo',
                'Suspendido',
                'Retirado'
            ]);
            $table->enum('ranurable', [
                'Si',
                'No',
            ]);
            $table->unsignedBigInteger('unidad_medida_id');
            $table->unsignedBigInteger('via_administracion_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('presentacion_farmaceutica_id');
            $table->unsignedBigInteger('laboratorio_id');
            $table->unsignedBigInteger('stock');
            $table->timestamps();

            //references
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medidas')->onDelete('cascade');
            $table->foreign('via_administracion_id')->references('id')->on('via_administracions')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('presentacion_farmaceutica_id')->references('id')->on('presentacion_farmaceuticas')->onDelete('cascade');
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
