<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicos>
 */
class MedicosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'nro_caja' => $this->faker->unique()->numberBetween(100000, 999999),
            'especialidad' => $this->faker->randomElement([
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
        ];
    }
}
