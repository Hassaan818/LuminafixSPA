<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'expertise_heading' => 'From idea to scale, we drive B2B growth.',
            'expertise_description' => 'Our teams help you bring your ideas to life, execute a growth-centric business strategy, and become market and investor ready. We specialize in driving sales for SaaS companies and have extensive experience in creating and executing marketing campaigns that work. Our team is passionate about helping your business grow and succeed. We are experts in B2B marketing and know how to reach your target market, and can help you create a successful marketing strategy that fits your budget.',
            'footer_short_description' => 'Luminafix is a full-service B2B marketing company helping startups grow through a combination of strategy, email marketing, demand generation, and marketing automation.',
            'phone' => '+92 333 9359119',
            'email' => 'info@luminafix.com',
            'linkedin' => 'https://pk.linkedin.com/company/luminafix',
        ]);
    }
}
