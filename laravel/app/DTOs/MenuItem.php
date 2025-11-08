<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Auth;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class MenuItem
{
    /**
     * @var array<MenuItem>
     */
    public array $items;

    public function __construct(
        public string $text,
        public ?Icon $icon,
        public ?string $path,
        public bool $allowed = true,
        $items = [],
        public bool $licensed = true
    ) {
        $this->items = $items;
    }

    public static function resource(string $name, ?Icon $icon = null)
    {
        $user = Auth::user();

        return new self(
            text: __('general.'.$name),
            icon: $icon,
            path: route($name.'.index'),
            allowed: $user->hasPermission($name.'-index')
        );
    }
}
