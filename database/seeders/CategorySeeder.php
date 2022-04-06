<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Wealth',
            'Family & Life',
            'Trust',
            'Career',
            'Critical Thinking'
         ];
 
         foreach ($categories as $category) {
            $newCategory = Category::create([
                'category_name' => $category,
            ]);
         }
    }
}
