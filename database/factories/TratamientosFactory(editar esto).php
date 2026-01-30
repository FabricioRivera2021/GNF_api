<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tratamientos>
 */
class TratamientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'meses_tratamiento' => $this->faker->numberBetween(1, 6),
            'dias_tratamiento' => $this->faker->optional()->numberBetween(1, 31),
            'medicos_id' => 1,
            'medication_id' => 1, //\App\Models\Medications::factory(), --- IGNORE ---
            'customer_id' => 1,
            'user_id' => 1,
            'vigencia' => $this->faker->boolean(),
            'tipo_tto' => $this->faker->randomElement(['cronico', 'agudo', 'FNR', 'compra_especial']),
            'dosis' => $this->faker->numberBetween(1, 5),
            'frecuencia' => $this->faker->randomElement([3, 6, 8, 12, 24]),
            'observaciones' => $this->faker->optional()->text(50),
        ];
    }
}
