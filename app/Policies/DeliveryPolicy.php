<?php

namespace App\Policies;

use App\Models\Delivery;
use App\Models\Project;
use App\Models\User;

class DeliveryPolicy
{

    public function owner(User $user , Project $project): bool
    {
        return $user->id == $project->user_id;
    }

    public function user(User $user, Delivery $delivery): bool
    {
        return $user->id == $delivery->user_id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user , Project $project): bool
    {
        return $user->id == $project->user_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $project , Delivery $delivery): bool
    {
        return ($user->id == $project->user_id || $user->id == $delivery->user_id );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user , Project $project): bool
    {
        return !($user->id == $project->user_id);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project , Delivery $delivery): bool
    {
        return ($user->id == $project->user_id || $user->id == $delivery->user_id );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Delivery $delivery): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Delivery $delivery): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Delivery $delivery): bool
    {
        return false;
    }
}
