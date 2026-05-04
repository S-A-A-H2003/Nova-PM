<?php

namespace App\Actions\Task;

use App\Models\Project;
use App\Services\Utilities;

class UpdateTask {

    public function update($request , $project , $task)
    {
        $utilities = new Utilities();
        $error = '';

        $validated = $request->validated();
        $validated['project_id'] = $project->id;
        $validated['description'] = $utilities->descriptionClean($request->input('task_description'));
        if($request->input('status') == 'on') {
            $validated['status'] = 'active';
        }else{
            $validated['status'] = 'stopped';
        }

        if ($request->input('task_budget') != $task->budget) {
            if ($project->type == 'free') {
                return $error = 'There is no budget for the project that is free of type.';
            }
            $project_budget_holistic = $project->budget;
            $project_budget_negative = 0;

            foreach ($project->tasks as $ta) {
                $project_budget_negative += $ta->budget;
            }
            $project_budget_current = $project_budget_holistic - $project_budget_negative;
            if ($request->input('task_budget') > $project_budget_current) {
                return $error = 'Budget for the task of greater budget for the project.';
            }
            $validated['budget'] = $request->input('task_budget');
        }
        $result = $task->update($validated);
        return $error ? $error : $result;
    }
}
