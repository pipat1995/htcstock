<?php

namespace App\Services\KPI\Service;

use App\Models\KPI\TargetUnit;
use App\Services\BaseService;
use App\Services\KPI\Interfaces\TargetUnitServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TargetUnitService extends BaseService implements TargetUnitServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param TargetUnit $model
     */
    public function __construct(TargetUnit $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return TargetUnit::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdown(): Collection
    {
        try {
            return TargetUnit::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
