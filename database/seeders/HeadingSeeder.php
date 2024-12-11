<?php

namespace Database\Seeders;

use App\Models\Heading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Heading::create([
            'blog_id' => '1',
            'sequence' => 2,
            'heading' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'linkedin' => fake()->url(),
            'image' => fake()->imageUrl()
        ]);
    }
}
