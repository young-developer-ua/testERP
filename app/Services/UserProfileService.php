<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;

class UserProfileService
{
    public function getTeamLeads(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()->where('role_id', RoleEnum::TEAMLEAD->value)->get();
    }

    public function updateUser(UpdateRequest $updateRequest, User $user): void
    {
        $user->name = $updateRequest->name;
        $user->email = $updateRequest->email;
        $user->team_lead_id = $updateRequest->team_lead_id;
        $user->save();
    }
}
