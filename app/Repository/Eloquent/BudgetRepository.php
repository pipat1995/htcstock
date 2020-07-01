<?php

namespace App\Repository\Eloquent;

use App\Budgets;
use App\Repository\BudgetRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class BudgetRepository extends BaseRepository implements BudgetRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Accessories $model
     */
    public function __construct(Budgets $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Budgets::select('id', 'budgets_of_month', 'month', 'year', 'created_at');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hasBudget(String $month, String $year)
    {
        try {
            return Budgets::where('year', $year)->where('month', $month)->get()->count();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
