<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoTerapeuticoSeeder extends Seeder
{
    public function run(): void
    {
        $grupos = [
          'AINEs',
          'Opioides',
          'Antibioticos',
          'Antimicoticos',
          'Antivirales',
          'Antiparasitarios',
          'Antihistaminicos',
          'Ansioliticos sedantes',
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
          'Relajantes musculares',
          'Hormonas analogos',
          'Gastroprotectores',
          'Antiemeticos',
          'Antidiarreicos',
          'Laxantes',
          'Antiasmaticos',
          'Antiplaquetarios',
          'Anticoagulantes',
          'Vasodilatadores'
        ];

        foreach ($grupos as $grupo) {
            DB::table('grupo_terapeuticos')->insert([
                'nombre' => $grupo,
                'descripcion' => 'description example',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
