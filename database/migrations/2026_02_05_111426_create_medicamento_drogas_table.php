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
        Schema::create('medicamento_drogas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('droga_id');
            $table->unsignedBigInteger('concentracion_id')->nullable(); //para tipos de presentacion que no tengan concentracion, puede ser null
            $table->decimal('valor_unidad', 8, 2)->default(0); //ej: 500mg
            $table->unsignedBigInteger('dosis_unidad'); //ej: mg, ml

            $table->timestamps();

            //references
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->foreign('droga_id')->references('id')->on('drugs');
            $table->foreign('concentracion_id')->references('id')->on('concentraciones');
            $table->foreign('dosis_unidad')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_drogas');
    }
};
