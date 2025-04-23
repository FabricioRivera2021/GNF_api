<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentacionFarmaceuticaSeeder extends Seeder
{
    public function run(): void
    {
        $presentaciones = [
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
        ];

        foreach ($presentaciones as $presentacion) {
            DB::table('presentacion_farmaceuticas')->insert([
                'presentacion' => $presentacion,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
