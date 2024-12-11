<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'team_id' => 1,
            'title' => 'Seo practice',
            'slug' => 'seo-practice',
            'short_description' => fake()->sentence(),
            'description' => fake()->sentence(),
            'image' => fake()->imageUrl(),
            'status' => 1
        ]);
    }
}
