<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => fake()->sentence(mt_rand(10, 15)),
            'slug' => fake()->slug(),
            'descriptions' => fake()->paragraph(mt_rand(1, 5)),
            'content' => fake()->paragraph(mt_rand(5, 10)),
            'category_id' => mt_rand(1, 6),
            'author' => mt_rand(1, 5),
        ];
    }
}
