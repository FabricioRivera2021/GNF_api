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
      Schema::create('grupo_terapeutico_medications', function (Blueprint $table) {
        $table->foreignId('grupo_terapeutico_id')->constrained('grupo_terapeuticos')->onDelete('cascade');
        $table->foreignId('medication_id')->constrained('medications')->onDelete('cascade');
        $table->primary(['grupo_terapeutico_id', 'medication_id']);
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
