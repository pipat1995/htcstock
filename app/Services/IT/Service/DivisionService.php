<?php

namespace App\Services\IT\Service;

use App\Models\Division;
use App\Services\BaseService;
use App\Services\IT\Interfaces\DivisionServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DivisionService extends BaseService implements DivisionServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Division $model
     */
    public function __construct(Division $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Division::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdown(): Collection
    {
        try {
            return Division::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
