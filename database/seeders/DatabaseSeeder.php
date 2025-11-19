<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Unidad_medida;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seeders
        $this->call([
          CategoriaSeeder::class,
          LaboratoriosSeeder::class,
          ViaAdministracionSeeder::class,
          PresentacionFarmaceuticaSeeder::class,
          GrupoTerapeuticoSeeder::class
        ]);

        \App\Models\UnidadMedida::factory()->create(['unidad_medida' => 'mg']);

        \App\Models\Especialidad::factory(10)->create();

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
            'fecha_vencimiento' => '2026-12-31',
            'droga' => 'Paracetamol',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Dolex',
            'unidades_caja' => 100,
            'unidad_medida_id' => 1,
            'via_administracion_id' => 1,
            'categoria_id' => 1,
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica_id' => 3,
            'laboratorio_id' => 1,
            'stock' => 20000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '654321',
            'fecha_vencimiento' => '2027-01-31',
            'droga' => 'Ibuprofeno',
            'droga_concentracion' => '200mg',
            'nombre_comercial' => 'Advil',
            'unidades_caja' => 30,
            'unidad_medida_id' => 1,
            'via_administracion_id' => 1,
            'categoria_id' => 1,
            'receta' => 'no',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica_id' => 3,
            'laboratorio_id' => 1,
            'stock' => 15000
        ]);
        \App\Models\Medications::factory()->create([
            'lote' => '789012',
            'fecha_vencimiento' => '2028-11-30',
            'droga' => 'Amoxicilina',
            'droga_concentracion' => '500mg',
            'nombre_comercial' => 'Amoxil',
            'unidades_caja' => 30,
            'unidad_medida_id' => 1,
            'via_administracion_id' => 1,
            'categoria_id' => 1,
            'receta' => 'si',
            'refrigeracion' => 'no',
            'estado' => 'Activo',
            'ranurable' => 'No',
            'presentacion_farmaceutica_id' => 2,
            'laboratorio_id' => 5,
            'stock' => 10000
        ]);

        //medicos
        // \App\Models\Medicos::factory()->create(['nombre' => 'Miguel','apellido' => 'Lopez','nro_caja' => 123456,'especialidad' => 'Inmunologia']);
        \App\Models\Medicos::factory()->count(10)->create();
        
        //tramtamiento
        \App\Models\Tratamientos::factory(4)->create();

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

        //esto es para que no se rompa al buscar los nombres de los grupos terapeuticos y no encontrar nada
        //grupos terapeuticos y relacion con medicaciones
        $med1 = \App\Models\Medications::find(1); //Paracetamol
        $med1->grupos_terapeuticos()->attach(1); // Aines
        $med1->grupos_terapeuticos()->attach(2); // Analgesicos
        $med2 = \App\Models\Medications::find(2); //ibpurofeno
        $med2->grupos_terapeuticos()->attach(1); // Aines
        $med2->grupos_terapeuticos()->attach(2); // Analgesicos
        $med3 = \App\Models\Medications::find(3); //amoxicilina
        $med3->grupos_terapeuticos()->attach(3); // Antibioticos
        //ingresar los med a la bd
        $med1->save();
        $med2->save();
        $med3->save();
    }
}