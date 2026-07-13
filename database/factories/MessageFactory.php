<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            // Message model has no defined fillable fields in repo; provide generic fields if present
            'content' => $this->faker->sentence(),
            'user_id' => User::factory(),
        ];
    }
}
