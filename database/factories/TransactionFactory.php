<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'acc_no' => $this->faker->regexify('##[A-Za-z0-9]{3}-[A-Za-z0-9]{5}'), 
            'amount' => 7000, 
            'status' => $this->faker->randomElement(['success', 'failed', 'hold']), 
        ];
    }
}
