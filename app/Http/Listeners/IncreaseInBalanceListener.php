<?php

namespace App\Listeners;

use App\Events\IncreaseInBalanceEvent;
use App\Models\Task;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncreaseInBalanceListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IncreaseInBalanceEvent $event): void
    {
        $task = Task::find($event->delivery->task_id);
        $wallet = Wallet::where('user_id' , $event->delivery->user_id)->first();

        try {
            DB::beginTransaction();

            $wallet->update([
                'balance' => ($wallet->balance + $task->budget)
            ]);

            $wallet->transactions()->create([
                'type' => 'transfer_in',
                'amount' => $task->budget,
                'status' => 'completed',
                'description' =>'add a is the best to you of '. $task->title,
            ]);

            Auth::user()->wallet->transactions()->create([
                'type' => 'transfer_in',
                'amount' => - $task->budget,
                'status' => 'completed',
                'description' =>'take a is the best to  '. $wallet->user->name,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
