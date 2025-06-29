<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Languages',
                'name_fr' => 'Langues',
                'slug' => 'languages',
                'icon' => 'fas fa-language'
            ],
            [
                'name_en' => 'Information Technology',
                'name_fr' => 'Informatique',
                'slug' => 'it',
                'icon' => 'fas fa-laptop-code'
            ],
            [
                'name_en' => 'Office Tools',
                'name_fr' => 'Outils Bureau',
                'slug' => 'office-tools',
                'icon' => 'fas fa-file-alt'
            ],
            [
                'name_en' => 'Business',
                'name_fr' => 'Business',
                'slug' => 'business',
                'icon' => 'fas fa-briefcase'
            ],
            [
                'name_en' => 'Productivity',
                'name_fr' => 'Productivité',
                'slug' => 'productivity',
                'icon' => 'fas fa-clock'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
