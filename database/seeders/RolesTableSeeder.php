<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Role::query()->updateOrInsert(
            [
                'id' => RoleEnum::ADMIN->value
            ],
            [
                'id' => RoleEnum::ADMIN->value,
                'name' => RoleEnum::ADMIN->name(),
            ]
        );
        Role::query()->updateOrInsert(
            [
                'id' => RoleEnum::TEAMLEAD->value
            ],
            [
                'id' => RoleEnum::TEAMLEAD->value,
                'name' => RoleEnum::TEAMLEAD->name(),
            ]
        );
        Role::query()->updateOrInsert(
            [
                'id' => RoleEnum::BUYER->value
            ],
            [
                'id' => RoleEnum::BUYER->value,
                'name' => RoleEnum::BUYER->name(),
            ]
        );
    }
}
