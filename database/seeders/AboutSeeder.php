<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'breadcrumb_short_description' => 'We’re not just another E-Commerce and Digital Marketing agency—we’re a dedicated team of passionate, innovative, and results-driven experts that combine fresh & unique ideas with proven strategies to ensure your success.',
            'breadcrumb_description' => 'With 15 years of combined experience in Web Development, A-Z E-Commerce services— from startup launches to advanced management and advertising—on platforms like Amazon, Shopify, eBay, and more, we bring unparalleled expertise to the table. Coupled with Digital Marketing solutions such as Social Media Marketing, Lead Generation, Marketing Automation, Demand Generation, and Marketplace Optimization, we ensure your brand not only stands out but thrives in the competitive digital landscape',
            'breadcrumb_heading' => 'At LuminaFix, we’re here to transform your ideas into impactful digital experiences. Let’s elevate your brand together.',
            'wwa_heading' => 'Say goodbye to juggling multiple agencies or freelancers—LuminaFix delivers all your digital services in one place.',
            'wwa_description' => ' At LuminaFix, we’re a team of passionate innovators and creative problem-solvers dedicated to making your brand shine in the digital world. Got an Amazon store that needs a boost? Dreaming of a Shopify storefront that wows? Need a killer social media strategy or PPC campaigns that actually convert? Oh yes, we do all that—and so much more!
From full-scale e-commerce solutions for platforms like Amazon, eBay, Walmart, and Shopify to digital marketing services like social media marketing, email campaigns, lead generation, SEO, video production, and web development, we bring your vision to life. What sets us apart? We package all our expertise with a dash of creativity, a pinch of innovation, and an unwavering commitment to helping you crush your competition.

We believe real success is when your brand becomes part of your audience’s story.
',
            'wca_heading' => 'From strategy to execution, we know the e-commerce and digital marketing space inside out.
',
            'wca_description' => ' At LuminaFix, we’re driven by a passion for making a meaningful impact. Our mission is simple: to help your business grow by increasing brand awareness, driving qualified leads, and creating long-term success. We’re not just another agency—we’re a partner who believes in every service we provide and works tirelessly to offer sustainable, results-oriented solutions that align with your goals.

Need Help with Execution?
    We’ve got you covered. By outsourcing your tactical marketing to LuminaFix, you can focus on strategic decisions and your core business operations. Let us take care of the execution while you stay focused on the bigger picture. Together, we’ll scale your business faster, building a foundation for profitability and sustainability.
At LuminaFix, we’re more than a service provider—we’re your trusted partner in success. Let’s create something extraordinary together.
         '
        ]);
    }
}
