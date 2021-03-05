<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->words($nb = 3, $asText = true),
            'description' => $this->faker->sentences(10, true),
            'status' => $this->faker->randomElement(['instock','outofstock','draft','publish','trash']),
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2,0,1000),
            'banner' => $this->faker->imageUrl(),
            'images' => [$this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl()],
            'categories' => array_map(function () {return rand(1, 100);}, array_fill(0, rand(1, 10), null)),
            'brands' => array_map(function () {return rand(1, 100);}, array_fill(0, rand(1, 10), null)),
            'tags' => array_map(function () {return rand(1, 100);}, array_fill(0, rand(1, 10), null)),
            'reviews' => array_map(function () {return rand(1, 100);}, array_fill(0, rand(1, 10), null)),
        ];
    }

}