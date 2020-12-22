<?php

namespace App\Http\Filters\IT;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\IT\Query\DepartmentFilter;
use App\Http\Filters\IT\Query\DivisionFilter;
use App\Http\Filters\IT\Query\PositionFilter;
use App\Http\Filters\IT\Query\UserFilter;
use App\Http\Filters\IT\Query\UserRoleFilter;

class UserManagementFilter extends AbstractFilter
{
    protected $filters = [
        'search' => UserFilter::class,
        'division' => DivisionFilter::class,
        'department' => DepartmentFilter::class,
        'position' => PositionFilter::class,
        'user_role' => UserRoleFilter::class
    ];
}
