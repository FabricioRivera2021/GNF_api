<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especialidad>
 */
class EspecialidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->randomElement([
                'Inmunologia',
                'MedicinaCritica',
                'MedicinaDeRehabilitacion',
                'MedicinaDeportiva',
                'MedicinaFamiliar',
                'MedicinaForense',
                'MedicinaInterna',
                'MedicinaNuclear',
                'Nefrologia',
                'Neumologia',
                'Neurologia',
                'Neurocirugia',
                'Nutriologia',
                'Obstetricia',
                'Oftalmologia',
                'Oncologia',
                'Ortopedia',
                'Otorrinolaringologia',
                'Pediatria',
                'Psiquiatria',
                'Radiologia',
                'Reumatologia',
                'Traumatologia',
                'Urologia'
            ]),
            'descripcion' => $this->faker->sentence(10),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'codigo' => $this->faker->unique()->numberBetween(100000, 999999),
        ];
    }
}
