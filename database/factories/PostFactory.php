<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'news', true),
            'author' => $this->faker->name(),
            'category_id' => null, // تأكد من أن لديك فئات مسبقًا
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
