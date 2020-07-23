<?php

namespace App\Repository\Eloquent;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\SystemRepositoryInterface;
use App\System;
use Illuminate\Database\Eloquent\Builder;

class SystemRepository extends BaseRepository implements SystemRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param System $model
     */
    public function __construct(System $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return System::select('id', 'name', 'description', 'image');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
