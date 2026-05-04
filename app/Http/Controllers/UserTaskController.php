<?php

namespace App\Http\Controllers;

use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserTaskController extends Controller
{
    public function add($project_id , $task_id)
    {
        $exists = UserTask::where('user_id' , Auth::id())->where('task_id' , $task_id)->exists();
        if ($exists) {
            $user_task = UserTask::where('user_id' , Auth::id())->where('task_id' , $task_id);
            $user_task->delete();
            return redirect()->back()->with('success' , 'the unadded was success');
        }else{
            UserTask::create([
                'user_id' => Auth::id(),
                'project_id' => $project_id,
                'task_id' => $task_id,
            ]);

            return redirect()->back()->with('success' , 'the added was success');
        }
    }
}
