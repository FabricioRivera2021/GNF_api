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
        Schema::create('treatments_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id'); //porque es un item de un treatment
            $table->unsignedBigInteger('droga_id'); //medicacion del item
            $table->decimal('dosis_valor', 10, 2); //cantidad de la dosis
            $table->unsignedBigInteger('dosis_unidad'); //unidad de la dosis (mg, ml, gr, etc.)
            $table->unsignedBigInteger('frecuencia_horas'); //frecuencia de administracion (cada 8, 6, 12 horas, etc.)
            $table->unsignedBigInteger('duracion_dias'); //duracion en dias del tratamiento para este item
            $table->unsignedBigInteger('via_administracion_id'); //via de administracion (oral, intravenosa, etc.)
            $table->timestamps();

            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->foreign('droga_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('via_administracion_id')->references('id')->on('via_administracions')->onDelete('cascade');
            $table->foreign('dosis_unidad')->references('id')->on('unidad_medidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments_items');
    }
};
