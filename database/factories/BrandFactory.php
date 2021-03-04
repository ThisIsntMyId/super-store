<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

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
            'featured' => $this->faker->boolean(),
            'categories' => array_map(function () {return rand(1, 100);}, array_fill(0, rand(1, 10), null)),
        ];
    }
}
