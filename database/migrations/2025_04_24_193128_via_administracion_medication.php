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
      Schema::create('via_administracion_medications', function (Blueprint $table) {
        $table->foreignId('via_administracion_id')->constrained('via_administracions')->onDelete('cascade');
        $table->foreignId('medication_id')->constrained('medications')->onDelete('cascade');
        $table->primary(['via_administracion_id', 'medication_id']);
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
