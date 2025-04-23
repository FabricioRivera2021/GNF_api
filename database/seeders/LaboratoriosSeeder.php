<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratorios = [
            'Pfizer',
            'Roche',
            'Novartis',
            'AbbVie',
            'GileadSciences',
            'Amgen',
            'AstraZeneca',
            'BoerhingerIngelheim',
            'BristolMyersSquibb',
            'EliLilly',
            'Johnson&Johnson',
            'Merck',
            'Sanofi',
            'GlaxoSmithKline',
            'Bayer',
            'Takeda',
            'Mylan',
            'Teva',
            'Sandoz',
            'AurobindoPharma',
            'Cipla',
            'Forest Laboratories',
            'Eli Lilly',
        ];

        foreach ($laboratorios as $lab) {
            Laboratorio::factory()->create([
                'razon_social' => $lab,
            ]);
        }
    }
}
