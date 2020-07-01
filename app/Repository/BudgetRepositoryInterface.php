<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BudgetRepositoryInterface
{
    public function all(): Builder;
    public function create(array $attributes): Model;
    public function find(String $id): Model;

    public function update(array $attributes, String $id): bool;
    public function hasBudget(String $month,String $year);
}
