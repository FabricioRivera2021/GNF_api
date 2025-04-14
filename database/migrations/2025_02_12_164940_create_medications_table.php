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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('lote');
            $table->date('fecha_vencimiento');
            $table->string('droga');
            $table->string('droga_concentracion');
            $table->string('nombre_comercial');
            $table->string('unidades_caja');
            $table->enum('grupo_terapeutico', [
                'Analgesicos_antipireticos',
                'AINEs',
                'Opioides',
                'Antibioticos',
                'Antimicoticos',
                'Antivirales',
                'Antiparasitarios',
                'Antihistaminicos',
                'Ansioliticos_sedantes',
                'Antidepresivos',
                'Antipsicoticos',
                'Broncodilatadores',
                'Corticoides',
                'Diureticos',
                'Hipoglucemiantesorales',
                'Hipolipemiantes',
                'Insulinas',
                'Antihipertensivos',
                'Antiarritmicos',
                'Inmunosupresores',
                'Inmunoestimulantes',
                'Anticonvulsivantes',
                'Relajantesmusculares',
                'Hormonas_analogos',
                'Gastroprotectores',
                'Antiemeticos',
                'Antidiarreicos',
                'Laxantes',
                'Antiasmaticos',
                'Antiplaquetarios',
                'Anticoagulantes',
                'Vasodilatadores'
            ]);
            $table->enum('unidad_medida', [
                'g',
                'mg',
                'ml',
                'mcg',
                'puff',
                'ui',
            ]);
            $table->enum('via_administracion', [
                'Oral',
                'Sublingual',
                'Rectal',
                'Vaginal',
                'Oftalmica',
                'Otica',
                'Nasal',
                'Inhalatoria',
                'Topica',
                'Transdermica',
                'Intramuscular',
                'Intravenosa',
                'Subcutanea',
                'Intradermica',
                'Intratecal',
                'Intraarticular',
                'Intracardiaca',
                'Intracavernosa',
                'Intracavitaria',
                'Intracorneal',
                'Intrafolicular',
                'Intrahepatica',
                'Intralinfatica',
                'Intraperitoneal',
                'Intrapleural',
                'Intraraquidea',
                'Intratimpanica',
                'Intravesical',
                'Intraventricular',
                'Intravaginal',
                'Intravitrea',
                'Intracoronaria',
            ]);
            $table->enum('tipo_medicamento', [
                'Generico',
                'Referencia',
                'Comercial',
                'Controlado',
                'AltoCosto',
                'Hospitalario',
                'Otro'
            ]);
            $table->enum('receta', [
                'Si',
                'No',
            ]);
            $table->enum('refrigeracion', [
                'Si',
                'No',
            ]);
            $table->enum('estado', [
                'Activo',
                'Inactivo',
                'Suspendido',
                'Retirado'
            ]);
            $table->enum('ranurable', [
                'Si',
                'No',
            ]);
            $table->enum('presentacion_farmaceutica', [
                'Tableta',
                'Capsula',
                'Comprimido',
                'Gragea',
                'Polvo',
                'Granulado',
                'Jarabe',
                'Suspension',
                'Emulsion',
                'Solucion',
                'Gotas',
                'Ampolla',
                'Inyectable',
                'Supositorio',
                'Ovulo',
                'Crema',
                'Pomada',
                'Gel',
                'Ungüento',
                'ParcheTransdermico',
                'Aerosol',
                'Nebulizador',
                'Colirio',
                'Enema'
            ]);
            $table->enum('laboratorio', [
                'Pfizer',
                'Roche',
                'Novartis',
                'AbbVie',
                'GileadSciences',
                'Amgen',
                'AstraZeneca',
                'BoerhingerIngelheim',
                'BristolMyersSquibb',
                'EliLilly',
                'Johnson&Johnson',
                'Merck',
                'Sanofi',
                'GlaxoSmithKline',
                'Bayer',
                'Takeda',
                'Mylan',
                'Teva',
                'Sandoz',
                'AurobindoPharma',
                'Cipla',
                'Forest Laboratories',
                'Eli Lilly'
            ]);
            $table->unsignedBigInteger('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
