<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        // attach to project or task
        $attachToProject = $this->faker->boolean(60);

        return [
            'user_id' => User::factory(),
            'content' => $this->faker->sentence(12),
            'commentable_type' => $attachToProject ? Project::class : Task::class,
            'commentable_id' => $attachToProject ? Project::factory() : Task::factory(),
        ];
    }
}
