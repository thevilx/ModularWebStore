<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraphs(rand(3,10) , true),
            'user_id' => User::inRandomOrder()->first()->id,
            'special' => rand(0 , 1),
        ];
    }
}
