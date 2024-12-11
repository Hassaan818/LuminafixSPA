<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Muhammad Waqar',
            'slug' => 'muhammad-waqar',
            'job_title' => 'Lead Generation Expert | LinkedIn Expert | Data Entry | CRM Expert',
            'image' => fake()->image(),
            'status' => '1',
            'linkedin' => 'https://www.linkedin.com/in/muhammadwaqarva/'
        ]);

        Team::create([
            'name' => 'Farrukh Waseem',
            'slug' => 'farrukh-wasim',
            'job_title' => 'Lead Generation Expert | Certified Amazon Expert | CRM Expert',
            'image' => fake()->image(),
            'status' => '1',
            'linkedin' => 'https://www.linkedin.com/in/farrukhwasim/'
        ]);

        Team::create([
            'name' => 'Muhammad Hassaan',
            'slug' => 'muhammad-hassaan',
            'job_title' => 'Full Stack Developer | Laravel | React JS | Tailwind CSS | Restful Apis',
            'image' => fake()->image(),
            'status' => '1',
            'linkedin' => 'https://www.linkedin.com/in/hassaan-khan-b7106811a/'
        ]);
    }
}
