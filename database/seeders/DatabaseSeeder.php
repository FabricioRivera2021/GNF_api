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

        //medicos
        \App\Models\Medicos::factory()->create(['nombre' => 'Miguel','apellido' => 'Lopez','nro_caja' => 123456,'especialidad' => 'Inmunologia']);
        \App\Models\Medicos::factory()->create(['nombre' => 'Jose','apellido' => 'Guerra','nro_caja' => 111111,'especialidad' => 'MedicinaCritica']);
        \App\Models\Medicos::factory()->create(['nombre' => 'Maria','apellido' => 'Perez','nro_caja' => 222222,'especialidad' => 'MedicinaDeRehabilitacion']);
        
        //tramtamiento
        \App\Models\Tratamientos::factory()->create([
            'fecha_inicio' => '2023-01-01',
            'fecha_fin' => '2023-02-02',
            'tto_dias_mes' => 7,
            'medicos_id' => 1,
            'medication_id' => 1,
            'customer_id' => 1,
            'user_id' => 1,
            'activo' => 1,
            'total_tto_dias' => 7,
            'total_tto_dias_pendientes' => 5,
            'tipo_tto' => 'agudo',
            'retiros_por_mes' => 1,
            'retiros_pendientes' => 1,
        ]);
        \App\Models\Tratamientos::factory()->create([
            'fecha_inicio' => '2023-02-01',
            'fecha_fin' => '2023-04-02',
            'tto_dias_mes' => 30,
            'medicos_id' => 2,
            'medication_id' => 2,
            'customer_id' => 1,
            'user_id' => 1,
            'activo' => 1,
            'total_tto_dias' => 60,
            'total_tto_dias_pendientes' => 45,
            'tipo_tto' => 'cronico',
            'retiros_por_mes' => 1,
            'retiros_pendientes' => 1,
        ]);
        \App\Models\Tratamientos::factory()->create([
            'fecha_inicio' => '2023-02-01',
            'fecha_fin' => '2023-05-02',
            'tto_dias_mes' => 90,
            'medicos_id' => 2,
            'medication_id' => 4,
            'customer_id' => 1,
            'user_id' => 1,
            'activo' => 1,
            'total_tto_dias' => 90,
            'total_tto_dias_pendientes' => 20,
            'tipo_tto' => 'cronico',
            'retiros_por_mes' => 1,
            'retiros_pendientes' => 1,
        ]);
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