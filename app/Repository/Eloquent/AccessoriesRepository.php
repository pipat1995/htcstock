<?php

namespace App\Repository\Eloquent;

use App\Accessories;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class AccessoriesRepository extends BaseRepository implements AccessoriesRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Accessories $model
     */
    public function __construct(Accessories $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Accessories::whereNotNull('access_id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
