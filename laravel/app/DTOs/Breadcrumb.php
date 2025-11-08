<?php

namespace App\DTOs;

use Illuminate\Support\Collection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use stdClass;

#[TypeScript]
class Breadcrumb
{
    public function __construct(
        public string $title,
        public string $url
    ) {
    }

    public static function collect(Collection $collection)
    {
        return $collection->map(fn (stdClass $item) => new self($item->title, $item->url));
    }
}
