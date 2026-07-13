<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $categories = ['programming', 'designing', 'other'];
        $statuses = ['active', 'stopped'];
        $types = ['free', 'paid'];

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text(200),
            'category' => $this->faker->randomElement($categories),
            'status' => $this->faker->randomElement($statuses),
            'type' => $this->faker->randomElement($types),
            'budget' => $this->faker->numberBetween(50, 10000),
        ];
    }
}
