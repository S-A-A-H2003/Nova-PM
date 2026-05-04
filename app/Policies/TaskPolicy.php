<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    public function checkView(User $user , Project $project)
    {
        return $user->id == $project->user_id;
    }

    public function create(User $user , Project $project): bool
    {
        return $user->id == $project->user_id;
    }

    public function update(User $user, Project $project): bool
    {
        return $user->id == $project->user_id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->id == $project->user_id;
    }

}
