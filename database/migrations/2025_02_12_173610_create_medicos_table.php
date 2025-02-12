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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedBigInteger('nro_caja');
            $table->enum('especialidad', [
                'Inmunologia',
                'MedicinaCritica',
                'MedicinaDeRehabilitacion',
                'MedicinaDeportiva',
                'MedicinaFamiliar',
                'MedicinaForense',
                'MedicinaInterna',
                'MedicinaNuclear',
                'Nefrologia',
                'Neumologia',
                'Neurologia',
                'Neurocirugia',
                'Nutriologia',
                'Obstetricia',
                'Oftalmologia',
                'Oncologia',
                'Ortopedia',
                'Otorrinolaringologia',
                'Pediatria',
                'Psiquiatria',
                'Radiologia',
                'Reumatologia',
                'Traumatologia',
                'Urologia'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
