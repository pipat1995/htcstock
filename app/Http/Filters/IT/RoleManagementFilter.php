<?php

namespace App\Http\Filters\IT;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\IT\Query\RoleFilter;

class RoleManagementFilter extends AbstractFilter
{
    protected $filters = [
        'role' => RoleFilter::class
    ];
}
