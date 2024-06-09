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
        \App\Models\User::factory()->create(['name' => 'Marcos','email' => 'ceci@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Diego','email' => 'vero@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Gimena','email' => 'luci@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Diana','email' => 'vale@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Marcela','email' => 'marcos@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Pepe','email' => 'fabi@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Ricardo','email' => 'generico@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Miguel','email' => 'generico2@example.com','roles_id' => 2 , 'positions_id' => 1]);
        
        \App\Models\Numeros::factory(45)->create();

        \App\Models\Customers::factory(100)->create();
    }
}
