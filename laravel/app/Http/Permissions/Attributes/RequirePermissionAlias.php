<?php

namespace App\Http\Permissions\Attributes;

use App\Models\User;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class RequirePermissionAlias
{
    public function __construct(public string $permissionBase) {}

    public function allow(User $user, string $controllerMethod): bool
    {
        $controllerMethod = str_replace('store', 'create', $controllerMethod);
        $controllerMethod = str_replace('update', 'edit', $controllerMethod);

        $permission = sprintf('%s-%s', $this->permissionBase, $controllerMethod);

        return $user->hasPermission($permission);
    }

    public function getErrorMessage(string $controllerMethod): string
    {

        $permission = sprintf('%s-%s', $this->permissionBase, $controllerMethod);

        $permission = $this->humanReadablePermission($permission);

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
