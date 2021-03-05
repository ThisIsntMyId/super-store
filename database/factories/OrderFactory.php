<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $details = [
            'cart' => [
                2 => [
                    'price' => 1500,
                    'quantity' => 2
                ],
                3 => [
                    'price' => 500,
                    'quantity' => 4
                ],
                5 => [
                    'price' => 2000,
                    'quantity' => 1
                ],
            ]
        ];
        return [
            'status' => $this->faker->randomElement(['placed', 'processing', 'dispatched', 'canceled', 'delivered']),
            'trackable' => $this->faker->boolean(),
            'details' => json_encode($details),
            'user_id' => $this->faker->numberBetween(1,100),
            'transaction_id' => $this->faker->numberBetween(1,100),
            'amount' => 7000,
        ];
    }
}
