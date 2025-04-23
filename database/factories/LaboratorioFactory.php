<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratorio>
 */
class LaboratorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_contacto' => $this->faker->name,
            'telefono_contacto' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'email_contacto' => $this->faker->unique()->safeEmail,
            // 'razon_social' => $this->faker->company,
            'web' => $this->faker->url,
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'observaciones' => $this->faker->optional()->sentence,
        ];
    }
}
