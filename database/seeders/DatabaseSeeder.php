<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Roles::factory()->create(['roles' => 'admin']);
        \App\Models\Roles::factory()->create(['roles' => 'regular']);

        \App\Models\Estados::factory()->create(['estados' => 'todos', 'active' => 1, 'paraLlamar' => 1]);
        \App\Models\Estados::factory()->create(['estados' => 'para ventanilla', 'active' => 1, 'paraLlamar' => 1]);
        \App\Models\Estados::factory()->create(['estados' => 'en ventanilla', 'active' => 1, 'paraLlamar' => 0]);
        \App\Models\Estados::factory()->create(['estados' => 'para preparacion', 'active' => 1, 'paraLlamar' => 1]);
        \App\Models\Estados::factory()->create(['estados' => 'en preparacion', 'active' => 1, 'paraLlamar' => 0]);
        \App\Models\Estados::factory()->create(['estados' => 'para caja', 'active' => 1, 'paraLlamar' => 1]);
        \App\Models\Estados::factory()->create(['estados' => 'en caja', 'active' => 1, 'paraLlamar' => 0]);
        \App\Models\Estados::factory()->create(['estados' => 'para entrega', 'active' => 1, 'paraLlamar' => 1]);
        \App\Models\Estados::factory()->create(['estados' => 'en entrega', 'active' => 1, 'paraLlamar' => 0]);
        \App\Models\Estados::factory()->create(['estados' => 'finalizado', 'active' => 1, 'paraLlamar' => 1]);

        \App\Models\Filas::factory()->create(['filas' => 'Comun', 'prefix' => 'NC', 'active' => 1]);
        \App\Models\Filas::factory()->create(['filas' => 'Emergencia', 'prefix' => 'EM', 'active' => 1]);
        \App\Models\Filas::factory()->create(['filas' => 'FNR', 'prefix' => 'FNR', 'active' => 1]);
        \App\Models\Filas::factory()->create(['filas' => 'Prioridad', 'prefix' => 'PR', 'active' => 1]);

        \App\Models\UserPosition::factory()->create(['position' => 'sin asignar']);
        \App\Models\UserPosition::factory()->create(['position' => 'ventanilla 1']);
        \App\Models\UserPosition::factory()->create(['position' => 'ventanilla 2']);
        \App\Models\UserPosition::factory()->create(['position' => 'ventanilla 3']);
        \App\Models\UserPosition::factory()->create(['position' => 'ventanilla 4']);
        \App\Models\UserPosition::factory()->create(['position' => 'preparacion']);
        \App\Models\UserPosition::factory()->create(['position' => 'entrega 1']);
        \App\Models\UserPosition::factory()->create(['position' => 'entrega 2']);
        \App\Models\UserPosition::factory()->create(['position' => 'caja 1']);
        \App\Models\UserPosition::factory()->create(['position' => 'caja 2']);

        \App\Models\User::factory()->create(['name' => 'admin','email' => 'admin@example.com','roles_id' => 1, 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Generico1','email' => 'generico1@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Generico2','email' => 'generico2@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Generico3','email' => 'generico3@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Generico4','email' => 'generico4@example.com','roles_id' => 2 , 'positions_id' => 1]);
        
        \App\Models\Numeros::factory(45)->create();

        \App\Models\Customers::factory(100)->create();

        \App\Models\Medications::factory()->create([
            'lote' => '123456',
            'fecha_vencimiento' => '2023-12-31',
            'droga' => 'Paracetamol',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Dolex',
            'unidades_caja' => 100,
            'grupo_terapeutico' => 'Analgesicos_antipireticos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 20000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '654321',
            'fecha_vencimiento' => '2024-01-31',
            'droga' => 'Ibuprofeno',
            'droga_concentracion' => '200mg',
            'nombre_comercial' => 'Advil',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'AINEs',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 15000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '789012',
            'fecha_vencimiento' => '2023-11-30',
            'droga' => 'Amoxicilina',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Amoxil',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antibioticos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Capsula',
            'laboratorio' => 'GileadSciences',
            'stock' => 10000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '345678',
            'fecha_vencimiento' => '2025-05-15',
            'droga' => 'Metformina',
            'droga_concentracion' => '850mg',
            'nombre_comercial' => 'Glucophage',
            'unidades_caja' => 60,
            'grupo_terapeutico' => 'Hipoglucemiantesorales',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Novartis',
            'stock' => 12000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '987654',
            'fecha_vencimiento' => '2024-03-20',
            'droga' => 'Loratadina',
            'droga_concentracion' => '10mg',
            'nombre_comercial' => 'Claritin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihistaminicos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Amgen',
            'stock' => 8000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '112233',
            'fecha_vencimiento' => '2023-10-10',
            'droga' => 'Simvastatina',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Zocor',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Hipolipemiantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 5000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '445566',
            'fecha_vencimiento' => '2024-07-25',
            'droga' => 'Omeprazol',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Prilosec',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Gastroprotectores',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Capsula',
            'laboratorio' => 'AbbVie',
            'stock' => 7000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '778899',
            'fecha_vencimiento' => '2025-02-28',
            'droga' => 'Atenolol',
            'droga_concentracion' => '50mg',
            'nombre_comercial' => 'Tenormin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'AstraZeneca',
            'stock' => 6000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '998877',
            'fecha_vencimiento' => '2023-09-15',
            'droga' => 'Levotiroxina',
            'droga_concentracion' => '100mcg',
            'nombre_comercial' => 'Synthroid',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Hormonas_analogos',
            'unidad_medida' => 'mcg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche',
            'stock' => 9000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '223344',
            'fecha_vencimiento' => '2024-06-30',
            'droga' => 'Amlodipino',
            'droga_concentracion' => '5mg',
            'nombre_comercial' => 'Norvasc',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 11000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '556677',
            'fecha_vencimiento' => '2023-08-20',
            'droga' => 'Alprazolam',
            'droga_concentracion' => '0.5mg',
            'nombre_comercial' => 'Xanax',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Ansioliticos_sedantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Controlado',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 13000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '334455',
            'fecha_vencimiento' => '2024-04-10',
            'droga' => 'Sertralina',
            'droga_concentracion' => '50mg',
            'nombre_comercial' => 'Zoloft',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antidepresivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 14000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '667788',
            'fecha_vencimiento' => '2023-11-05',
            'droga' => 'Atorvastatina',
            'droga_concentracion' => '40mg',
            'nombre_comercial' => 'Lipitor',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Hipolipemiantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 16000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '990000',
            'fecha_vencimiento' => '2024-09-30',
            'droga' => 'Furosemida',
            'droga_concentracion' => '40mg',
            'nombre_comercial' => 'Lasix',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Diureticos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Sanofi',
            'stock' => 17000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '111222',
            'fecha_vencimiento' => '2023-12-31',
            'droga' => 'Clonazepam',
            'droga_concentracion' => '0.5mg',
            'nombre_comercial' => 'Klonopin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Ansioliticos_sedantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Controlado',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche',
            'stock' => 18000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '333444',
            'fecha_vencimiento' => '2024-01-15',
            'droga' => 'Ciprofloxacino',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Cipro',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antibioticos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Bayer',
            'stock' => 19000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '555666',
            'fecha_vencimiento' => '2023-10-20',
            'droga' => 'Lisinopril',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Prinivil',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Merck',
            'stock' => 20000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '777888',
            'fecha_vencimiento' => '2024-08-31',
            'droga' => 'Esomeprazol',
            'droga_concentracion' => '40mg',
            'nombre_comercial' => 'Nexium',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Gastroprotectores',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'AstraZeneca',
            'stock' => 21000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '999000',
            'fecha_vencimiento' => '2023-11-10',
            'droga' => 'Montelukast',
            'droga_concentracion' => '10mg',
            'nombre_comercial' => 'Singulair',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antiasmaticos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Merck',
            'stock' => 22000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '222333',
            'fecha_vencimiento' => '2024-05-05',
            'droga' => 'Gabapentina',
            'droga_concentracion' => '300mg',
            'nombre_comercial' => 'Neurontin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Anticonvulsivantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 23000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '444555',
            'fecha_vencimiento' => '2023-12-01',
            'droga' => 'Duloxetina',
            'droga_concentracion' => '30mg',
            'nombre_comercial' => 'Cymbalta',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antidepresivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Eli Lilly',
            'stock' => 24000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '666777',
            'fecha_vencimiento' => '2024-02-20',
            'droga' => 'Venlafaxina',
            'droga_concentracion' => '75mg',
            'nombre_comercial' => 'Effexor',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antidepresivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 25000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '888999',
            'fecha_vencimiento' => '2023-10-30',
            'droga' => 'Escitalopram',
            'droga_concentracion' => '10mg',
            'nombre_comercial' => 'Lexapro',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antidepresivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Forest Laboratories',
            'stock' => 26000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '000111',
            'fecha_vencimiento' => '2024-03-15',
            'droga' => 'Tamsulosina',
            'droga_concentracion' => '0.4mg',
            'nombre_comercial' => 'Flomax',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'BoerhingerIngelheim',
            'stock' => 27000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '222444',
            'fecha_vencimiento' => '2023-11-25',
            'droga' => 'Clopidogrel',
            'droga_concentracion' => '75mg',
            'nombre_comercial' => 'Plavix',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antiplaquetarios',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Sanofi',
            'stock' => 28000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '555888',
            'fecha_vencimiento' => '2024-06-10',
            'droga' => 'Warfarina',
            'droga_concentracion' => '5mg',
            'nombre_comercial' => 'Coumadin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Anticoagulantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'BristolMyersSquibb',
            'stock' => 29000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '999111',
            'fecha_vencimiento' => '2023-09-05',
            'droga' => 'Rivaroxaban',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Xarelto',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Anticoagulantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Bayer',
            'stock' => 30000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '444999',
            'fecha_vencimiento' => '2023-10-15',
            'droga' => 'Apixaban',
            'droga_concentracion' => '5mg',
            'nombre_comercial' => 'Eliquis',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Anticoagulantes',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'BristolMyersSquibb',
            'stock' => 32000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '777000',
            'fecha_vencimiento' => '2024-11-30',
            'droga' => 'Clonidina',
            'droga_concentracion' => '0.1mg',
            'nombre_comercial' => 'Catapres',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'BoerhingerIngelheim',
            'stock' => 33000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '111000',
            'fecha_vencimiento' => '2023-12-20',
            'droga' => 'Nitroglicerina',
            'droga_concentracion' => '0.4mg',
            'nombre_comercial' => 'Nitrostat',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Vasodilatadores',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Sublingual',
            'tipo_medicamento' => 'Generico',
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer',
            'stock' => 34000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '222000',
            'fecha_vencimiento' => '2024-01-10',
            'droga' => 'Aspirina',
            'droga_concentracion' => '81mg',
            'nombre_comercial' => 'Bayer Aspirin',
            'unidades_caja' => 30,
            'grupo_terapeutico' => 'Antiplaquetarios',
            'unidad_medida' => 'mg',
            'via_administracion' => 'Oral',
            'tipo_medicamento' => 'Generico',
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Bayer',
            'stock' => 35000
        ]);

        //medicos
        // \App\Models\Medicos::factory()->create(['nombre' => 'Miguel','apellido' => 'Lopez','nro_caja' => 123456,'especialidad' => 'Inmunologia']);
        \App\Models\Medicos::factory()->count(10)->create();
        
        //tramtamiento
        \App\Models\Tratamientos::factory(10)->create();

        \App\Models\HistorialRetiros::factory()->create([
            'tto_id' => 1,
            'customer_id' => 1,
            'user_id' => 1,
            'fecha_retiro' => '2023-01-01'
        ]);
        \App\Models\HistorialRetiros::factory()->create([
            'tto_id' => 2,
            'customer_id' => 1,
            'user_id' => 1,
            'fecha_retiro' => '2023-02-01'
        ]);
        \App\Models\HistorialRetiros::factory()->create([
            'tto_id' => 3,
            'customer_id' => 1,
            'user_id' => 1,
            'fecha_retiro' => '2023-02-01'
        ]);
    }
}