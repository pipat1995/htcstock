<?php

namespace App\Services\IT\Service;

use App\Models\IT\Budgets;
use App\Services\BaseService;
use App\Services\IT\Interfaces\BudgetServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BudgetService extends BaseService implements BudgetServiceInterface
{
    /**
     * UserService constructor.
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
            return Budgets::whereNotNull('id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hasBudget(String $month, String $year): bool
    {
        try {
            return Budgets::where('year', $year)->where('month', $month)->get()->count() > 0 ? true : false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filterForBudget(Request $request)
    {
        return Budgets::filter($request)->orderBy('created_at', 'desc')->paginate(10);
    }
}
