<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;

    public function definition()
    {
        // attach to either a project or a task
        $isProject = $this->faker->boolean(70);

        return [
            'attachment' => 'storage/uploads/' . $this->faker->lexify('file_????') . '.' . $this->faker->fileExtension(),
            'project_id' => $isProject ? Project::factory() : null,
            'task_id' => $isProject ? null : Task::factory(),
        ];
    }
}
