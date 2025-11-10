<?php

namespace App\Http\Permissions;

use App\Models\User;

interface ControllerMethodAttributeContract
{
    public function allow(User $user): bool;

    public function getErrorMessage(): string;
}
