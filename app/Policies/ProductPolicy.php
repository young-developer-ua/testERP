<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function index(User $user): bool
    {
        return $user->role->id === RoleEnum::BUYER->value;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function show(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->id === RoleEnum::BUYER->value;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }
}
