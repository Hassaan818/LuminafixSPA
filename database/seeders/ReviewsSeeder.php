<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'project_name' => fake()->sentence(),
            'project_summary' => fake()->sentence(),
            'project_review' => fake()->sentence(),
            'feedback' => fake()->sentence(),
            'image' => fake()->imageUrl(),
            'client_name' => fake()->name(),
            'status' => random_int(1,2),
        ]);
    }
}
