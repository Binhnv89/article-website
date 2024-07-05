<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        for ($i = 0; $i < 6; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 3),
                'user_id' => rand(1, 2),
                'title' => fake()->sentence(6),
                'image' => fake()->imageUrl(),
                'short_content' => fake()->text(200),
                'content' => fake()->text(1500),
                'views' => fake()->numberBetween(0, 100),
                'created_at' => now()
            ]);
        }
    }
}
