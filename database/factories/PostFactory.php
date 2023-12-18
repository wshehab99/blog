<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

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
            'user_id'=>User::factory()->create(),
            'category_id'=>Category::factory()->create(),
            'title'=>$this->faker->sentence,
            'excerpt'=>$this->faker->paragraph(6,false),
            'body'=>$this->faker->paragraph(16,false),
        ];
    }
}
