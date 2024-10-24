<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Models\User;

class UserStatisticsService
{
    public function getUserStatistics($authUser): \Illuminate\Database\Eloquent\Collection|array|\Illuminate\Support\Collection
    {
        return match ($authUser->role->id) {
            RoleEnum::ADMIN->value => $this->getAllUsersStatistics(),
            RoleEnum::TEAMLEAD->value => $this->getTeamLeadUsersStatistics($authUser),
            RoleEnum::BUYER->value => $this->getBuyerStatistics($authUser),
            default => collect(),
        };
    }

    protected function getAllUsersStatistics(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->withCount('products')
            ->where('role_id', '!=', RoleEnum::ADMIN->value)
            ->get();
    }

    protected function getTeamLeadUsersStatistics($teamLead): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->withCount('products')
            ->where('team_lead_id', $teamLead->id)
            ->get();
    }

    protected function getBuyerStatistics($buyer): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->withCount('products')
            ->where('id', $buyer->id)
            ->get();
    }
}
