<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(10),
            'user_id' => rand(1, 20),
            'content' => $this->faker->paragraph(20),
            'published' => rand(0, 1),
            'premium' => rand(0, 1),
            'date' => now(),
            'image' => $this->faker->imageUrl(1200, 800)
        ];
    }
}
