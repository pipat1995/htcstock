<?php

namespace App\Http\Filters\Legal;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\Legal\Query\AgreementFilter;
use App\Http\Filters\Legal\Query\StatusFilter;

class ContractRequestFilter extends AbstractFilter
{
    protected $filters = [
        'status' => StatusFilter::class,
        'agreement' => AgreementFilter::class
    ];
}
