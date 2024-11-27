<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'type' => $this->faker->randomElement(['credit', 'debit']),
            'transaction_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
