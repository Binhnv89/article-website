<?php

namespace Database\Factories;

use App\Models\Category;
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
            //
            // 'title' => fake()->sentence(6),
            // 'image' => fake()->image,
            // 'poster' => fake()->name(),
            // 'short_content' => fake(),
            // 'content' => fake()->text(50),
            // 'views' => fake()->numberBetween(0, 100),
            // 'category_id' => Category::factory(),
        ];
    }
}
