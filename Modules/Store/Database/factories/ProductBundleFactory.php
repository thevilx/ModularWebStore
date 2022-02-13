<?php
namespace Modules\Store\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductBundleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Store\Entities\ProductBundle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3 , true),
            'slug' => $this->faker->slug(3),
            'description' => $this->faker->paragraph(),
        ];
    }
}

