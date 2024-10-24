<?php

namespace App\Enums;

enum RoleEnum: int
{
    case ADMIN = 1;
    case TEAMLEAD = 2;
    case BUYER = 3;

    public function name(): string
    {
        return match($this) {
            self::ADMIN => 'Адмін',
            self::TEAMLEAD => 'Тімлід',
            self::BUYER => 'Байер',
        };
    }
}
