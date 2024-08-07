<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Ujian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'material_id' => fake()->randomElement(Material::pluck('id')),
            'ujian_id' => fake()->randomElement(Ujian::pluck('id')),
            'question' => fake()->sentence(10),
            'a' => fake()->word(),
            'b' => fake()->word(),
            'c' => fake()->word(),
            'd' => fake()->word(),
            'answer' => fake()->randomElement(['a', 'b', 'c', 'd']),
        ];
    }
}
