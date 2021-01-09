<?php

namespace App\Observers;

use App\Models\Enums\RoleEnum;
use App\Models\Product;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserObserver
{
    public function creating(User $user)
    {
        $user->role_uuid = $user->role_uuid ?? RoleEnum::USER;
    }
}
