<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medications>
 */
class DrugsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //el nombre tiene que ser random y unico entre una lista predeterminada
            //solo tiene nombre, no tiene descripcion ni nada mas
            'droga' => $this->faker->unique()->randomElement(
                [
                    'Aspirina', 
                    'Ibuprofeno', 
                    'Paracetamol', 
                    'Amoxicilina', 
                    'Metformina',
                    'Omeprazol',
                    'Simvastatina',
                    'Losartan',
                    'Levotiroxina',
                    'Atorvastatina',
                    'Alprazolam',
                    'Citalopram',
                    'Clopidogrel',
                    'Furosemida',
                    'Gabapentina',
                    'Hidroclorotiazida',
                    'Lisinopril',
                    'Metoprolol',
                    'Pantoprazol',
                    'Sertralina',
                    'Tramadol',
                    'Warfarina',
                    'Zolpidem',
                ]),
        ];
    }
}
