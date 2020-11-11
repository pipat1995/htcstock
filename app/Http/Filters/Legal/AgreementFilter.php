<?php
namespace App\Http\Filters\Legal;

class AgreementFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('agreement_id', [...$value]);
    }
}
