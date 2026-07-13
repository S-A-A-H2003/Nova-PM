<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition()
    {
        $statusOptions = ['not evaluation', 'evaluation'];
        $evaluationOptions = ['pad', 'good', 'very good', 'excellent'];

        return [
            'task_id' => Task::factory(),
            'project_id' => Project::factory(),
            'user_id' => User::factory(),
            'link' => $this->faker->url(),
            'feedback' => $this->faker->sentence(),
            'is_best' => $this->faker->boolean(10),
            'evaluation' => $this->faker->randomElement($evaluationOptions),
            'status' => $this->faker->randomElement($statusOptions),
        ];
    }
}
