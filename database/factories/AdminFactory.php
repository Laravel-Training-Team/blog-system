<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
