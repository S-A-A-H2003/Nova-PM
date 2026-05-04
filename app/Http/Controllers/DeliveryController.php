<?php

namespace App\Http\Controllers;

use App\Events\IncreaseInBalanceEvent;
use App\Models\Delivery;
use App\Models\Project;
use App\Models\Task;
use App\Services\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeliveryController extends Controller
{

    public function store(Request $request , Project $project , Task $task)
    {
        Gate::authorize('create' , [Delivery::class , $project]);
        $exists_user = Delivery::where('user_id' , $request->user()->id)->exists();
        $exists_task = Delivery::where('task_id' , $task->id)->exists();
        $request->validate([
            'link'=> ['required' , 'url']
        ]);
        if ($exists_user && $exists_task) {
            return redirect()->back()->with(['error'=>'cant create more than delivery']);
        }
        Delivery::create([
            'task_id' => $task->id,
            'project_id' => $project->id,
            'user_id' => $request->user()->id,
            'link' => $request->input('link')
        ]);

        return redirect()->back();
    }

    public function update(Request $request , Project $project , Delivery $delivery , Utilities $utilities)
    {
        Gate::authorize('update' , [Delivery::class , $project , $delivery]);

        $request->validate([
            "link" => ['url'] ,
            "evaluation" => ['in:pad,good,very good,excellent'] ,
        ]);

        if (Gate::allows('user' , [Delivery::class , $delivery]) && $delivery->status != 'evaluation') {
            $delivery->update([
                "link" => $request->input('link')
            ]);

            return redirect()->back()->with('success' , 'ok');
        }

        if (Gate::allows('owner' , [Delivery::class , $project])) {
            if ($project->deliveries->where('is_best' , '1')->count() == 1) {
                $delivery->update([
                    "feedback" => $utilities->descriptionClean($request->input('feedback')),
                    "evaluation" => $request->input('evaluation'),
                    "status" => "evaluation"
                ]);
                return redirect()->back()->with('success' , 'ok but cant update is best becuase you give is best befor');
            }

           $delivery->update([
                "feedback" => $utilities->descriptionClean($request->input('feedback')),
                "is_best" => $request->input('isbest') == 'on' ? 1 : 0,
                "evaluation" => $request->input('evaluation'),
                "status" => "evaluation"
            ]);

            if ($delivery->is_best == 1) {
                event(new IncreaseInBalanceEvent($delivery));
            }
            return redirect()->back()->with('success' , 'ok');
        }

        return redirect()->back()->with('error' , 'no');

    }
}
