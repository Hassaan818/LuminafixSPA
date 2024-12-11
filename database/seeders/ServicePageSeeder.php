<?php

namespace Database\Seeders;

use App\Models\ServicePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServicePage::create([
            'page_short_description' => fake()->sentence(),
            'page_title' => fake()->name(),
            'page_description' => fake()->sentence()
        ]);
    }
}
