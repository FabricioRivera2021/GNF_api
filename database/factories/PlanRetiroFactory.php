<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Retiro>
 */
class PlanRetiroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'customer_id' => \App\Models\Customers::factory(),
          'tratamiento_id' => \App\Models\Tratamientos::factory(),
          'fecha_retiro' => $this->faker->date(),
          'cantidad_retirada' => $this->faker->numberBetween(1, 100),
          'user_id' => \App\Models\User::factory(),
          'observaciones' => $this->faker->optional()->text(200),
        ];
    }
}
