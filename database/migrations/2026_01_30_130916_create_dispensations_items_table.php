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
        Schema::create('dispensations_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dispensation_id'); //porque es un item de una dispensation
            $table->unsignedBigInteger('treatment_item_id')->nullable(); //porque puede venir de un tto ya existente
            $table->unsignedBigInteger('lote_id')->nullable(); //lote del item dispensado
            $table->unsignedBigInteger('cantidad_entregada'); //cantidad entregada de este item
            $table->string('unidad');
            $table->string('origen_tipo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensations_items');
    }
};
