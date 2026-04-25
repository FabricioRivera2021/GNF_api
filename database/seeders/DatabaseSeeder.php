<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\UnidadMedida::factory()->create(['unidad_medida' => 'mg']);
        //codigo 	tipo 	factor_base
        DB::table('unidades')->insert(['codigo' => 'mg','tipo' => 'masa','factor_base' => 1,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => 'ml','tipo' => 'volumen','factor_base' => 1,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => 'g','tipo' => 'masa','factor_base' => 1000,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => 'mcg','tipo' => 'masa','factor_base' => 0.001,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => '%','tipo' => 'porcentaje','factor_base' => null,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => 'dosis','tipo' => 'dosis','factor_base' => null,'created_at' => now(),'updated_at' => now()]);
        DB::table('unidades')->insert(['codigo' => 'ui','tipo' => 'unidad internacional','factor_base' => null,'created_at' => now(),'updated_at' => now()]);

        DB::table('concentraciones')->insert(['unidad_numerador' => 1, 'unidad_denominador' => 2, 'descripcion' => 'mg/ml', 'created_at' => now(), 'updated_at' => now() ]);
        DB::table('concentraciones')->insert(['unidad_numerador' => 1, 'unidad_denominador' => 3, 'descripcion' => 'mg/g', 'created_at' => now(), 'updated_at' => now() ]);
        DB::table('concentraciones')->insert(['unidad_numerador' => 1, 'unidad_denominador' => 4, 'descripcion' => 'mg/mcg', 'created_at' => now(), 'updated_at' => now() ]);
        DB::table('concentraciones')->insert(['unidad_numerador' => 6, 'unidad_denominador' => 2, 'descripcion' => 'dosis/ml', 'created_at' => now(), 'updated_at' => now() ]);

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

        //presentaciones farmaceuticas
        DB::table('presentaciones')->insert(['nombre' => 'Tabletas', 'created_at' => now(), 'updated_at' => now() ]);

        \App\Models\Drugs::factory(10)->create();

        \App\Models\Medicamento::factory()->create([
          /*
          $table->id();

          $table->string('nombre_comercial');

          $table->unsignedBigInteger('droga_id');
          $table->unsignedBigInteger('laboratorio_id');
          $table->unsignedBigInteger('presentacion_id');
          $table->unsignedBigInteger('concentracion_id');
          $table->unsignedBigInteger('via_administracion_id');

          $table->boolean('requiere_receta')->default(false);
          $table->boolean('requiere_refrigeracion')->default(false);
          $table->boolean('es_ranurable')->default(false);

          $table->foreignId('categoria_id')->constrained();

          $table->string('codigo_barra')->nullable();
          // $table->string('registro_msp')->nullable();

          $table->boolean('activo')->default(true);

          $table->timestamps();
           */

          // 'medicamento_droga_id' => 1, // Paracetamol
          'nombre_comercial' => 'Bio Grip L Descongestivo',
          'laboratorio_id' => 1, // Laboratorio 1
          'presentacion_id' => 1, // Tabletas
          // 'concentracion_id' => 2, // mg/g la concentracion ahora se maneja en la tabla medicamento_drogas
          'via_administracion_id' => 1, // Oral
          'requiere_receta' => false,
          'requiere_refrigeracion' => false,
          'es_ranurable' => false,
          'categoria_id' => 1, // Categoria 1
          'codigo_barra' => '1234567890123',
          'activo' => true,
        ]);


        \App\Models\MedicamentoDroga::factory()->create([
          'medicamento_id' => 1, // Medicamento 1
          'droga_id' => 1, // Paracetamol
          'concentracion_id' => 2, // mg/g
          'valor_unidad' => 500, // 500 mg
          'dosis_unidad' => 1, // mg
        ]);

        \App\Models\MedicamentoDroga::factory()->create([
          'medicamento_id' => 1, // Medicamento 1
          'droga_id' => 4, // Fenilefrina clorhidrato
          'concentracion_id' => 2, // mg/g
          'valor_unidad' => 8, // 500 mg
          'dosis_unidad' => 1, // mg
        ]);

        \App\Models\MedicamentoDroga::factory()->create([
          'medicamento_id' => 1, // Medicamento 1
          'droga_id' => 5, // Loratadina
          'concentracion_id' => 2, // mg/g
          'valor_unidad' => 3, // 500 mg
          'dosis_unidad' => 1, // mg
        ]);

        \App\Models\MedicamentoDroga::factory()->create([
          'medicamento_id' => 1, // Medicamento 1
          'droga_id' => 6, // Cafeina
          'concentracion_id' => 2, // mg/g
          'valor_unidad' => 30, // 500 mg
          'dosis_unidad' => 1, // mg
        ]);



        //medicos
        // \App\Models\Medicos::factory()->create(['nombre' => 'Miguel','apellido' => 'Lopez','nro_caja' => 123456,'especialidad' => 'Inmunologia']);
        \App\Models\Medicos::factory()
        ->hasAttached(\App\Models\Especialidad::factory(), [], 'especialidades')
        ->count(10)->create();
        
        //tramtamiento
        // \App\Models\Tratamientos::factory(4)->create();

        // \App\Models\HistorialRetiros::factory()->create([
        //     'tto_id' => 1,
        //     'customer_id' => 1,
        //     'user_id' => 1,
        //     'fecha_retiro' => '2023-01-01'
        // ]);
        // \App\Models\HistorialRetiros::factory()->create([
        //     'tto_id' => 2,
        //     'customer_id' => 1,
        //     'user_id' => 1,
        //     'fecha_retiro' => '2023-02-01'
        // ]);
        // \App\Models\HistorialRetiros::factory()->create([
        //     'tto_id' => 3,
        //     'customer_id' => 1,
        //     'user_id' => 1,
        //     'fecha_retiro' => '2023-02-01'
        // ]);

        //esto es para que no se rompa al buscar los nombres de los grupos terapeuticos y no encontrar nada
        //grupos terapeuticos y relacion con medicaciones
        // $med1 = \App\Models\Medications::find(1); //Paracetamol
        // $med1->grupos_terapeuticos()->attach(1); // Aines
        // $med1->grupos_terapeuticos()->attach(2); // Analgesicos
        // $med2 = \App\Models\Medications::find(2); //ibpurofeno
        // $med2->grupos_terapeuticos()->attach(1); // Aines
        // $med2->grupos_terapeuticos()->attach(2); // Analgesicos
        // $med3 = \App\Models\Medications::find(3); //amoxicilina
        // $med3->grupos_terapeuticos()->attach(3); // Antibioticos
        // //ingresar los med a la bd
        // $med1->save();
        // $med2->save();
        // $med3->save();
    }
}