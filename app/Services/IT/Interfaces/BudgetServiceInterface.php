<?php

namespace App\Services\IT\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface BudgetServiceInterface
{
    public function all(): Builder;
    public function create(array $attributes): Model;
    public function find(int $id): Model;

    public function update(array $attributes, int $id): bool;
    public function hasBudget(String $month, String $year): bool;
    public function filterForBudget(Request $request);
}
