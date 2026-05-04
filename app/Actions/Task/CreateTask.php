<?php

namespace App\Actions\Task;

use App\Models\Task;
use App\Services\Utilities;
use Illuminate\Support\Facades\DB;

class CreateTask {

    public function create($request , $project)
    {
        $utilities = new Utilities();
        $error = '';

        $validated = $request->validated();
        $validated['project_id'] = $project->id;
        $validated['description'] = $utilities->descriptionClean($request->input('task_description'));
        if ($request->input('task_budget') >0) {
            if ($project->type == 'free') {
                return $error = 'There is no budget for the project that is free of type.';
            }
            $project_budget_holistic = $project->budget;
            $project_budget_negative = 0;

            foreach ($project->tasks as $task) {
                $project_budget_negative += $task->budget;
            }
            $project_budget_current = $project_budget_holistic - $project_budget_negative;
            if ($request->input('task_budget') > $project_budget_current) {
                return $error = 'Budget for the task of greater budget for the project.';
            }
            $validated['budget'] = $request->input('task_budget');
        }
        try {
            DB::beginTransaction();
            $result = Task::create($validated);
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {
                    $data[] = [
                        "id" => uuid_create(),
                        "task_id" => $result->id,
                        "attachment" => $file->store('attachment/Task'),
                        "created_at" => now(),
                        "updated_at" => now()
                    ];
                }
                DB::table('attachments')->insert($data);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        return $error ? $error : $result;


    }
}
