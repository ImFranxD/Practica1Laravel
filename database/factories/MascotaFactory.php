<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $num = 1;
        
        return [
            'nombre' => fake()->name(),
            'edad' => fake()->numberBetween(20, 100),
            'raza' => fake()->randomElement(['Labrador Retriever', 'Bulldog', 'Poodle', 'Beagle', 'German Shepherd']),
            'alumno_id' => $num++,
        ];
    }
}
