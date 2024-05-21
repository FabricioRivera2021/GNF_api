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
        Schema::create('numeros', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->unsignedBigInteger('filas_id');
            $table->unsignedBigInteger('estados_id');
            $table->boolean('paused');
            $table->boolean('canceled');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->noActionOnDelete();
            $table->foreign('estados_id')->references('id')->on('estados')
            ->onDelete('cascade');
            $table->foreign('filas_id')->references('id')->on('filas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numeros');
    }
};
