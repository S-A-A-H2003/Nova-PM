<?php

namespace App\Observers;

use App\Models\Cv;
use App\Models\User;
use App\Models\Wallet;

class UserObserve
{
    public function created(User $user): void
    {
        Cv::create([
            'user_id' => $user->id,
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0
        ]);
    }

}
