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
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->id();
            $table->enum('nombre', [
                'Tableta',
                'Capsula',
                'Jarabe',
                'Inyectable',
                'Pomada',
                'Crema',
                'Suspension',
                'Solucion',
                'Gotas',
                'Spray',
                'Polvo',
                'Granulado',
                'Supositorio',
                'Parche',
                'Otros'
            ]);
            $table->string('nombre_comercial');
            $table->decimal('concentracion_valor', 10, 2 );
            $table->enum('unidad_dispensacion', [
                'mg',
                'g',
                'ml',
                'mcg',
                'UI'
            ]);
            $table->enum('concentracion_unidad', [
                'mg/g',
                'mg/ml',
                'g/ml',
                'mcg/ml',
                'UI/ml'
            ]);
            $table->enum('receta', [
                'Si',
                'No',
            ]);
            $table->enum('refrigeracion', [ 
                'Si',
                'No',
            ]);
            $table->enum('ranurable', [
                'Si',
                'No',
            ]);
            $table->unsignedBigInteger('droga_id');
            $table->unsignedBigInteger('laboratorio_id');

            //references
            $table->foreign('droga_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentaciones');
    }
};
