<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'minimal',
                'description' => 'Clean, minimal design with focus on content',
                'category' => 'minimal',
                'styles' => ':root {
                    --primary-color: #3A86FF;
                    --secondary-color: #6c757d;
                    --text-dark: #212529;
                    --text-light: #6c757d;
                    --bg-light: #f8f9fa;
                    --white: #ffffff;
                    --border-radius: 4px;
                    --shadow: 0 2px 4px rgba(0,0,0,0.1);
                }',
                'structure' => '<header>...</header><main>...</main><footer>...</footer>',
                'is_active' => true,
            ],
            [
                'name' => 'luxury',
                'description' => 'Elegant, premium design for luxury brands',
                'category' => 'luxury',
                'styles' => ':root {
                    --primary-color: #000000;
                    --secondary-color: #D4AF37;
                    --text-dark: #212529;
                    --text-light: #6c757d;
                    --bg-light: #FAF5F0;
                    --white: #ffffff;
                    --border-radius: 0px;
                    --shadow: 0 4px 12px rgba(0,0,0,0.15);
                }',
                'structure' => '<header>...</header><main>...</main><footer>...</footer>',
                'is_active' => true,
            ],
            [
                'name' => 'vibrant',
                'description' => 'Colorful, energetic design for modern brands',
                'category' => 'vibrant',
                'styles' => ':root {
                    --primary-color: #E53E3E;
                    --secondary-color: #DD6B20;
                    --text-dark: #212529;
                    --text-light: #6c757d;
                    --bg-light: #FFF5F5;
                    --white: #ffffff;
                    --border-radius: 12px;
                    --shadow: 0 4px 20px rgba(0,0,0,0.1);
                }',
                'structure' => '<header>...</header><main>...</main><footer>...</footer>',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}