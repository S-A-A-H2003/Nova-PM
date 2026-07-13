<?php

namespace Database\Factories;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    protected $model = Information::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'photo' => null,
            'email' => $this->faker->safeEmail(),
            'date_pirth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male','female']),
            'address' => $this->faker->address(),
            'occupation' => $this->faker->jobTitle(),
            'link_one' => null,
            'link_two' => null,
            'link_three' => null,
            'link_one_as' => null,
            'link_two_as' => null,
            'link_three_as' => null,
        ];
    }
}
