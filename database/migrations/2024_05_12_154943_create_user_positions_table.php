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
        Schema::create('user_positions', function (Blueprint $table) {
            $table->id();
            $table->enum('position', [
                'sin asignar',
                'ventanilla 1', 
                'ventanilla 2', 
                'ventanilla 3', 
                'ventanilla 4', 
                'preparacion', 
                'entrega 1', 
                'entrega 2', 
                'caja 1',
                'caja 2',
            ]);
            $table->boolean('occupied');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_positions');
    }
};
