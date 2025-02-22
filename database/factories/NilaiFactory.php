<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::pluck('id')),
            'group_id' => fake()->randomElement(Group::pluck('id')),
            'label' => fake()->randomElement(['tugas', 'quiz', 'uts', 'uas']),
            'value' => fake()->randomNumber(2, true),
        ];
    }
}
