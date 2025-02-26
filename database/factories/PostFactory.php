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
        $title = fake()->words(10, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(),
            'relevance' => fake()->numberBetween(1, 100),
            'user_id' => User::factory(),
        ];
    }
}
