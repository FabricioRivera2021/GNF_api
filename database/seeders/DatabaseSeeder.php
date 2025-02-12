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
            'fecha_vencimiento' => '2023-12-12',
            'droga' => 'Paracetamol',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Dolex',
            'grupo_terapeutico' => 'Analgesicos_antipireticos',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer'
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '654321',
            'fecha_vencimiento' => '2024-06-15',
            'droga' => 'Ibuprofeno',
            'droga_concentracion' => '400mg',
            'nombre_comercial' => 'Advil',
            'grupo_terapeutico' => 'AINEs',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '789012',
            'fecha_vencimiento' => '2025-08-20',
            'droga' => 'Amoxicilina',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Amoxil',
            'grupo_terapeutico' => 'Antibioticos',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Capsula',
            'laboratorio' => 'Novartis'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '987654',
            'fecha_vencimiento' => '2024-12-30',
            'droga' => 'Loratadina',
            'droga_concentracion' => '10mg',
            'nombre_comercial' => 'Clarityne',
            'grupo_terapeutico' => 'Antihistaminicos',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '456789',
            'fecha_vencimiento' => '2026-03-10',
            'droga' => 'Metformina',
            'droga_concentracion' => '850mg',
            'nombre_comercial' => 'Glucophage',
            'grupo_terapeutico' => 'Hipoglucemiantesorales',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '112233',
            'fecha_vencimiento' => '2025-01-25',
            'droga' => 'Salbutamol',
            'droga_concentracion' => '100mcg',
            'nombre_comercial' => 'Ventolin',
            'grupo_terapeutico' => 'Broncodilatadores',
            'unidad_medida' => 'mcg',
            'presentacion_farmaceutica' => 'Aerosol',
            'laboratorio' => 'AbbVie'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '334455',
            'fecha_vencimiento' => '2024-09-05',
            'droga' => 'Omeprazol',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Losec',
            'grupo_terapeutico' => 'Gastroprotectores',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Capsula',
            'laboratorio' => 'Amgen'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '778899',
            'fecha_vencimiento' => '2025-07-18',
            'droga' => 'Diclofenaco',
            'droga_concentracion' => '75mg',
            'nombre_comercial' => 'Voltaren',
            'grupo_terapeutico' => 'AINEs',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Novartis'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '223344',
            'fecha_vencimiento' => '2026-11-12',
            'droga' => 'Enalapril',
            'droga_concentracion' => '10mg',
            'nombre_comercial' => 'Renitec',
            'grupo_terapeutico' => 'Antihipertensivos',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '556677',
            'fecha_vencimiento' => '2025-02-28',
            'droga' => 'Diazepam',
            'droga_concentracion' => '5mg',
            'nombre_comercial' => 'Valium',
            'grupo_terapeutico' => 'Ansioliticos_sedantes',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Roche'
        ]);
        
        \App\Models\Medications::factory()->create([
            'lote' => '998877',
            'fecha_vencimiento' => '2024-05-22',
            'droga' => 'Atorvastatina',
            'droga_concentracion' => '20mg',
            'nombre_comercial' => 'Lipitor',
            'grupo_terapeutico' => 'Hipolipemiantes',
            'unidad_medida' => 'mg',
            'presentacion_farmaceutica' => 'Comprimido',
            'laboratorio' => 'Pfizer'
        ]);

        \App\Models\Medicos::factory()->create(['nombre' => 'Miguel','apellido' => 'Lopez','nro_caja' => 123456,'especialidad' => 'Inmunologia']);
        \App\Models\Medicos::factory()->create(['nombre' => 'Jose','apellido' => 'Guerra','nro_caja' => 111111,'especialidad' => 'MedicinaCritica']);
        \App\Models\Medicos::factory()->create(['nombre' => 'Maria','apellido' => 'Perez','nro_caja' => 222222,'especialidad' => 'MedicinaDeRehabilitacion']);
    }
}