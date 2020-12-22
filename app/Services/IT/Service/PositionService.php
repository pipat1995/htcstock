<?php

namespace App\Services\IT\Service;

use App\Models\Position;
use App\Services\BaseService;
use App\Services\IT\Interfaces\PositionServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PositionService extends BaseService implements PositionServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Position $model
     */
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Position::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdown(): Collection
    {
        try {
            return Position::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
