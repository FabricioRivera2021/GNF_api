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
        $isShortTreatment = $this->faker->boolean(50);
        $totalDays = $isShortTreatment
            ? $this->faker->numberBetween(1, 30)
            : $this->faker->randomElement([30, 60, 90, 120, 150, 180]); // 1 to 6 months
        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate = (clone $startDate)->modify("+{$totalDays} days");
        $ttoDiasMes = $this->faker->numberBetween(1, 10);
        $retirosMes = $this->faker->numberBetween(1, 3);
        $diasPendientes = $this->faker->numberBetween(0, $totalDays);
        $retirosPendientes = $this->faker->numberBetween(0, $retirosMes);
    
        return [
            'fecha_inicio' => $startDate->format('Y-m-d'),
            'fecha_fin' => $endDate->format('Y-m-d'),
            'tto_dias_mes' => $ttoDiasMes,
            'medicos_id' => $this->faker->numberBetween(1, 10),
            'medication_id' => $this->faker->numberBetween(1, 10),
            'customer_id' => 1,
            'user_id' => $this->faker->numberBetween(1, 5),
            'activo' => $this->faker->boolean(80),
            'total_tto_dias' => $totalDays,
            'total_tto_dias_pendientes' => $diasPendientes,
            'frecuencia' => $this->faker->randomElement([24, 12, 8, 6, 4, 3]),
            'cantidad_diaria' => $this->faker->numberBetween(1, 4),
            'tipo_tto' => $this->faker->randomElement(['crónico']),
            'retiros_por_mes' => $retirosMes,
            'retiros_pendientes' => $retirosPendientes,
        ];
    }
}
