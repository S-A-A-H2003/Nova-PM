<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Project;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['deposit','withdrawal']),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'currency' => 'USD',
            'status' => $this->faker->randomElement(['pending','succeeded','failed']),
            'description' => $this->faker->sentence(),
        ];
    }
}
