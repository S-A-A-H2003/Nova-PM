<?php

namespace App\Http\Controllers;

use App\Actions\Task\CreateTask;
use App\Actions\Task\UpdateTask;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Delivery;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $result_search = $request->input('search');
        if (isset($result_search)) {
            $tasks_in_progress = Auth::user()->tasks()->search("title" , $result_search)->get();
        }else{
            $tasks_in_progress = Auth::user()->tasks;
        }
        $tasks_in_progress = $tasks_in_progress->groupBy('project_id');
        return view('task.index' , compact('tasks_in_progress' , 'result_search'));
    }

    public function show(Project $project , Task $task )
    {
        $delivery_user = Delivery::where('user_id' , Auth::id())->where('task_id' , $task->id)->first();
        $comments = $task->comments()->with('user')->latest()->get();
        return view('task.show' , compact('task' , 'project' ,'delivery_user', 'comments'));
    }

    public function store(TaskStoreRequest $request , CreateTask $create_project , Project $project)
    {
        Gate::authorize('create' , [Task::class , $project]);
        $result = $create_project->create($request , $project);
        if (!(is_object($result))) {
            return back()->withInput()->withErrors(['budget' => $result]);
        }
        return redirect()->route('project.show' , $project->id)->with('success' , 'The task was successfully created.');

    }


    public function update(TaskUpdateRequest $request , UpdateTask $update_task , Project $project , Task $task)
    {
        Gate::authorize('update' , [Task::class , $project]);
        if ($project->deliveries->count() == 0) {
            $result = $update_task->update($request , $project , $task);
            if (!(is_bool($result))) {
                return back()->withInput()->withErrors(['budget' => $result]);
            }
            return redirect()->route('project.show' , $project->id)->with('success' , 'The task was successfully updated.');
        }else{
            return redirect()->route('project.show' , $project->id)->with('error' , 'You can not edited the task for preordful delivery.');
        }
    }

    public function destroy(Project $project ,Task $task)
    {
        Gate::authorize('delete' , [Task::class , $project]);
        if ($project->deliveries->count() == 0) {
            $task->delete();
            foreach ($task->attachments as $attachment) {
                Storage::delete($attachment->attachment);
            }
            $task->attachments()->delete();
            return redirect()->route('project.show' , $project->id)->with('success' , 'The task was successfully deleted.');
        }else{
            return redirect()->route('project.show' , $project->id)->with('error' , 'You can not deleted the task for preordful delivery.');
        }
    }
}
