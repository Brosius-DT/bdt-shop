<?php

namespace App\Http\Permissions\Attributes;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class TODOPermission extends RequireNoPermission
{

}
