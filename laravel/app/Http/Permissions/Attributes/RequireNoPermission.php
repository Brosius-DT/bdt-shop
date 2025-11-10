<?php

namespace App\Http\Permissions\Attributes;

use App\Http\Permissions\ControllerMethodAttributeContract;
use App\Models\User;
use Attribute;
use BadMethodCallException;

#[Attribute(Attribute::TARGET_METHOD)]
class RequireNoPermission implements ControllerMethodAttributeContract
{
    public function getErrorMessage(): string
    {
        throw new BadMethodCallException('this method should not be called');
    }

    public function allow(User $user): bool
    {
        return true;
    }
}
