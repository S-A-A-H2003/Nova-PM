<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        $statuses = ['active', 'stopped'];

        return [
            'project_id' => Project::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(500),
            'budget' => $this->faker->numberBetween(10, 5000),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
