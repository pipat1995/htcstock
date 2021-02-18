<?php

namespace App\Services\KPI\Service;

use App\Models\KPI\Rule;
use App\Services\BaseService;
use App\Services\KPI\Interfaces\RuleServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RuleService extends BaseService implements RuleServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Rule $model
     */
    public function __construct(Rule $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Rule::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdownRule(): Collection
    {
        try {
            return Rule::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filter(Request $request)
    {
        return Rule::filter($request)->orderBy('created_at', 'desc')
        ->get();
        // ->paginate(10);
    }
}
