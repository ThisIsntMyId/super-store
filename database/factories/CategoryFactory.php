<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'parent_id' => rand(1, 100),
        ];
    }
}
