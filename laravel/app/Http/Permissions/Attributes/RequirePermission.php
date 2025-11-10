<?php

namespace App\Http\Permissions\Attributes;

use App\Enums\Permissions;
use App\Http\Permissions\ControllerMethodAttributeContract;
use App\Models\User;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class RequirePermission implements ControllerMethodAttributeContract
{
    public function __construct(public string|Permissions $permission) {}

    public function allow(User $user): bool
    {
        return $user->hasPermission($this->permission);
    }

    public function getErrorMessage(): string
    {
        $permission = $this->humanReadablePermission($this->permission);

        return __('role.missingPermission', ['permissions' => $permission]);
    }

    private function humanReadablePermission(string $permission): string
    {
        $name = explode('-', $permission);
        if (count($name) === 2) {
            $name = __('general.'.$name[0]).' -  '.__('role.action.'.$name[1]);
        } else {
            $name = $permission;
        }

        return $name;
    }
}
