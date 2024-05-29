<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Numeros>
 */
class NumerosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $counter = 1;
    public function definition(): array
    {
        // Calculate estados_id based on the counter
        $estados_id = intdiv(self::$counter - 1, 5) + 1;

        return [
            'numero' => self::$counter++,
            'paused' => false,
            'canceled' => false,
            'estados_id' => $estados_id,
            'filas_id' => 1
        ];
    }
}
