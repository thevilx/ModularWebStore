<?php
namespace Modules\Store\Database\factories;

use Modules\Store\Entities\ProductBundle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Store\Entities\ProductAttributes;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Store\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(0 , 20),
            'price' => $this->faker->numberBetween(1000 , 50000),
        ];
    }
}

