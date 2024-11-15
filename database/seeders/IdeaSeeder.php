<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Idea;

class IdeaSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Writing', 'Art', 'Business', 'Technology', 'Education'];
        
        for ($i = 0; $i < 20; $i++) {
            Idea::create([
                'title' => 'Sample Idea ' . ($i + 1),
                'category' => $categories[array_rand($categories)],
                'description' => 'This is a sample description for idea ' . ($i + 1),
                'priority_level' => rand(1, 5)
            ]);
        }
    }
}