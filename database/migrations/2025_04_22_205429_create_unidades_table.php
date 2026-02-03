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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo'); //mg, g, ml, mcg, ui, %, etc.
            $table->string('tipo'); //masa, volumen, porcentaje, etc.
            $table->decimal('factor_base', 10, 6)->nullable(); //1, 1000, 0,0001 , etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
