<?php

namespace App\Actions\Project;

use App\Models\Project;
use App\Services\Utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateProject {

    public function update($request , $project)
    {
        $utilities = new Utilities();
        $user = Auth::user();
        $balance = $user->wallet->balance;
        $validated = $request->validated();

        $validated['description'] = $utilities->descriptionClean($request->input('description'));
        
        if ($request->input('name') != $project->name) {
            $name = Project::where('name' , $request->input('name'))->exists();
            if ($name) {
                return $result = ['name' => 'The name has already been taken.'];
            }
            $validated['name'] = $request->input('name');
        }

        if ($request->input('budget') == 0) {
            $validated['type'] = 'free';
        }else{
            $validated['type'] = 'paid';
        }

        // Budget
        if ($request->input('budget') < $project->budget) {
            $user->wallet->transactions()->create([
                    'type' => 'transfer_in',
                    'amount' => $project->budget - $request->input('budget'),
                    'status' => 'completed',
                    'description' =>'Update a project '. $request->input('name'),
                ]);
            $user->wallet->update([
                'balance' => ($balance + ($project->budget - $request->input('budget'))),
            ]);

            $validated['budget'] = $request->input('budget');

        }elseif ($request->input('budget') > $project->budget) {
            if($balance >= $request->input('budget')){
                $user->wallet->transactions()->create([
                        'type' => 'transfer_in',
                        'amount' => -$request->input('budget') - $project->budget,
                        'status' => 'completed',
                        'description' =>'Update a project '. $request->input('name'),
                    ]);
                $user->wallet->update([
                    'balance' => ($balance - ($request->input('budget') - $project->budget)),
                ]);

                $validated['budget'] = $request->input('budget');
            }else{
                return $result = ['budget' => 'You do not have enough credit.'];
            }

        }

        if($request->input('status') == 'on') {
            $validated['status'] = 'active';
        }else{
            $validated['status'] = 'stopped';
        }

        $result = $project->update($validated);

        return $result;
    }
}
