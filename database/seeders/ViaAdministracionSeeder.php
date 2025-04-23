<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViaAdministracionSeeder extends Seeder
{
    public function run(): void
    {
        $vias = [
          'Oral',
          'Sublingual',
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
        ];

        foreach ($vias as $via) {
            DB::table('Via_Administracions')->insert([
                'nombre' => $via,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
