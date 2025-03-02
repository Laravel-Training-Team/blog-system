<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

     

     
        Category::query()->delete();
        DB::statement("ALTER TABLE categories AUTO_INCREMENT = 1"); 

        $categories=[
            ['name'=>'Technology','description'=>'Tech news and articles','image' => 'technology.jpg'],
            ['name' => 'Health', 'description' => 'Health tips and news','image' => 'health.jpg'],
            ['name' => 'Sports', 'description' => 'Latest sports updates','image' => 'sports.jpg'],
        ];

        foreach($categories as $categoryData)
        {
            $category=Category::create($categoryData);
        }

    }
}
