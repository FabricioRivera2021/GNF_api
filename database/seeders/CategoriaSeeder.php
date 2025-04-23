<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
          'Generico',
          'Referencia',
          'Comercial',
          'Controlado',
          'AltoCosto',
          'Hospitalario',
          'LuchaAntituberculosa',
          'FNR',
          'Otro'
        ];

        foreach ($categorias as $nombre) {
            DB::table('categorias')->insert([
                'nombre_categoria' => $nombre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
