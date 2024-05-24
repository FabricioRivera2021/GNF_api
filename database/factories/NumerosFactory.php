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
        return [
            'numero' => self::$counter++,
            // 'user_id' => self::$counter3 < 9 ? self::$counter3++ : null,
            'paused' => false,
            'canceled' => false,
            'estados_id' => 2,
            'filas_id' => 1
        ];
    }
}
