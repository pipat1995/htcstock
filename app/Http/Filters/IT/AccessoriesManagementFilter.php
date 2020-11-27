<?php

namespace App\Http\Filters\IT;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\IT\Query\AccessoriesFilter;

class AccessoriesManagementFilter extends AbstractFilter
{
    protected $filters = [
        'accessory' => AccessoriesFilter::class,
    ];
}
