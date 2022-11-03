<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(0, 0, 1000.),
            'description' => $this->faker->text,
            'image' => 'image',
            'height' => $this->faker->randomFloat(0, 0, 5.),
            'width' => $this->faker->randomFloat(0, 0, 5.),
            'weight' => $this->faker->randomFloat(0, 0, 5.),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
