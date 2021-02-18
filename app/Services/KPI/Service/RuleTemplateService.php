<?php

namespace App\Services\KPI\Service;

use App\Models\KPI\RuleTemplate;
use App\Services\BaseService;
use App\Services\KPI\Interfaces\RuleTemplateServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RuleTemplateService extends BaseService implements RuleTemplateServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param RuleTemplate $model
     */
    public function __construct(RuleTemplate $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return RuleTemplate::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdownRuleTemplate(): Collection
    {
        try {
            return RuleTemplate::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filter(Request $request)
    {
        return RuleTemplate::filter($request)->orderBy('created_at', 'desc')
            ->get();
        // ->paginate(10);
    }
}
