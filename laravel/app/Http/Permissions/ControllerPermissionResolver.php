<?php

namespace App\Http\Permissions;

use App\Http\Permissions\Attributes\RequirePermissionAlias;
use App\Models\Permission;
use App\Models\User;
use BadMethodCallException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Routing\Controller;
use ReflectionClass;

class ControllerPermissionResolver
{
    public function checkPermissionOrFail(Controller $controller, string $action, User $user, ?string $controllerMethod = null): ?bool
    {

        $reflectionClass = new ReflectionClass($controller);

        if ($controllerMethod === null) {
            $explosion = explode('-', $action);

            if (count($explosion) == 2) {
                $controllerMethod = $explosion[1];
            } else {
                $controllerMethod = $explosion[0];
            }
        }

        return $this->resolveByMethodAttribute($reflectionClass, $controllerMethod, $user)
        ??
        $this->resolveByConvention($action, $user)
        ??
        $this->resolveByAlias($reflectionClass, $controllerMethod, $user)
        ??
        throw new BadMethodCallException(sprintf('No Permission found, add a permission attribute to the controller method (%s@%s) or create a permission %s', $controller::class, $controllerMethod, $action));
    }

    private function resolveByMethodAttribute(ReflectionClass $reflectionClass, string $controllerMethod, User $user): ?bool
    {

        foreach ($reflectionClass->getMethods() as $method) {
            if ($method->name == $controllerMethod) {

                $attributes = $method->getAttributes();

                foreach ($attributes as $attribute) {

                    $instance = $attribute->newInstance();

                    if ($instance instanceof ControllerMethodAttributeContract) {
                        if ($instance->allow($user) === false) {
                            throw new AuthorizationException($instance->getErrorMessage());
                        }
                        if ($instance->allow($user) === true) {
                            return true;
                        }
                    }
                }
            }
        }

        return null;
    }

    private function resolveByAlias(ReflectionClass $reflectionClass, string $controllerMethod, User $user): ?bool
    {

        foreach ($reflectionClass->getAttributes() as $attribute) {
            $instance = $attribute->newInstance();
            if ($instance instanceof RequirePermissionAlias) {
                if ($instance->allow($user, $controllerMethod) === false) {
                    throw new AuthorizationException($instance->getErrorMessage($controllerMethod));
                }
                if ($instance->allow($user, $controllerMethod) === true) {
                    return true;
                }
            }
        }

        return null;
    }

    private function resolveByConvention(string $action, User $user): ?bool
    {
        $permission = Permission::where('name', $action)->first();
        if ($permission === null) {
            return null;
        }

        throw_unless($user->hasPermission($permission->name), new AuthorizationException(sprintf('Missing permission: %s', $permission)));

        return true;
    }
}
