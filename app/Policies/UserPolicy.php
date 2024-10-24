<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can permanently delete the model.
     */
    public function show(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}
