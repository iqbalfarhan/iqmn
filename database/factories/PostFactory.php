<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'user_id' => fake()->randomElement(User::pluck('id')),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(),
            'tags' => fake()->words(),
            'show' => fake()->boolean(),
        ];
    }
}
