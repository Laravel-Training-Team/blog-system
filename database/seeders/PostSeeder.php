<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->create([
            'title' => 'Breaking News: Tech Industry Booming',
            'content' => 'The tech industry is growing rapidly with new advancements in AI and cloud computing.',
            'image' => 'tech-news.jpg',
            'author' => 'John Doe',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
