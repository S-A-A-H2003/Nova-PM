<?php

namespace Database\Factories;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    protected $model = Evaluation::class;

    public function definition()
    {
        $forProject = $this->faker->boolean(60);

        return [
            'evaluationable_type' => $forProject ? Project::class : Task::class,
            'evaluationable_id' => $forProject ? Project::factory() : Task::factory(),
            'user_id' => User::factory(),
            'rate' => $this->faker->numberBetween(1,5),
            'comment' => $this->faker->sentence(),
        ];
    }
}
