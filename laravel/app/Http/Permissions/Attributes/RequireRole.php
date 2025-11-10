<?php

namespace App\Http\Permissions\Attributes;

use App\Http\Permissions\ControllerMethodAttributeContract;
use App\Models\Role;
use App\Models\User;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class RequireRole implements ControllerMethodAttributeContract
{
    public function __construct(public string|Role $role) {}

    public function allow(User $user): bool
    {
        return $user->hasRole($this->role);
    }

    public function getErrorMessage(): string
    {
        $role = $this->humanReadableRole($this->role);

        return __('role.missingRole', ['role' => $role]);
    }

    private function humanReadableRole(string|Role $role): string
    {
        if (! $role instanceof Role) {
            $role = Role::where('name', $role)->firstOrFail();
        }

        return $role->name;
    }
}
