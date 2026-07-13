<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Transaction;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectObserve
{

    public function created(Project $project): void
    {
        $user = Auth::user();
        if (!$user || !$user->wallet) {
            return;
        }
        $balance = $user->wallet->balance;
        if ($project->budget > 0) {
            try {
                DB::beginTransaction();
                $user->wallet->transactions()->create([
                    'type' => 'transfer_in',
                    'amount' => -$project->budget,
                    'status' => 'completed',
                    'description' =>'Create a new project '. $project->name,
                ]);
                $user->wallet->update([
                    'balance' => ($balance - $project->budget),
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }

    public function deleted(Project $project): void
    {
        $user = Auth::user();
        if (!$user || !$user->wallet) {
            return;
        }
        $balance = $user->wallet->balance;
        if ($project->budget > 0) {
            try {
                DB::beginTransaction();
                $user->wallet->transactions()->create([
                    'type' => 'transfer_in',
                    'amount' => $project->budget,
                    'status' => 'completed',
                    'description' =>'Delete a project '. $project->name,
                ]);
                $user->wallet->update([
                    'balance' => ($balance + $project->budget),
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }
}
