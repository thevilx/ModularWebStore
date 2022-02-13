<?php

namespace Modules\Blog\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Article::class;

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
            'status' => $this->faker->randomElement(['active' , 'draft' , 'review']),
            'special' => rand(0 , 1),
        ];
    }
}
