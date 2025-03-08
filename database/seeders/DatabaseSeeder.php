<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء بيانات افتراضية
        Post::factory(10)->create();

        // استدعاء Seeder إضافي
        $this->call([
            CategorySeeder::class
        ]);
    }
}
