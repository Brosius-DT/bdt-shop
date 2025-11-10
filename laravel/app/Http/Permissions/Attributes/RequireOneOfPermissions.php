<?php

namespace App\Http\Permissions\Attributes;

use App\Enums\Permissions;
use App\Http\Permissions\ControllerMethodAttributeContract;
use App\Models\User;
use Attribute;
use Illuminate\Support\Collection;

#[Attribute(Attribute::TARGET_METHOD)]
class RequireOneOfPermissions implements ControllerMethodAttributeContract
{
    /**
     * @var Collection<string>
     */
    public Collection $permissions;

    /**
     * @param  array<string>  ...$permissions
     */
    public function __construct(string|Permissions ...$permissions)
    {
        $this->permissions = collect($permissions);
    }

    public function getErrorMessage(): string
    {

        $permissions = $this->permissions->map(fn ($permission) => $this->humanReadablePermission($permission))->implode(', ');

        return __('role.missingOneOfPermissions', ['permissions' => $permissions]);
    }

    private function humanReadablePermission(string|Permissions $permission): string
    {

        if (! is_string($permission)) {
            $permission = $permission->value;
        }

        $name = explode('-', $permission);
        if (count($name) === 2) {
            $name = __('general.'.$name[0]).' -  '.__('role.action.'.$name[1]);
        } else {
            $name = $permission;
        }

        return $name;
    }

    public function allow(User $user): bool
    {
        return $this->permissions
            ->reduce(fn ($carry, $permission) => $carry || $user->hasPermission($permission),
                false);
    }
}
