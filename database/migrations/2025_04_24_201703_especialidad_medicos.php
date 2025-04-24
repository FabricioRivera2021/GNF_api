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
      Schema::create('especialidad_medicos', function (Blueprint $table) {
        $table->foreignId('medicos_id')->constrained('medicos')->onDelete('cascade');
        $table->foreignId('especialidad_id')->constrained('especialidades')->onDelete('cascade');
        $table->primary(['medicos_id', 'especialidad_id']);
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
