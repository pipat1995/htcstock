<?php

namespace App\Services\IT\Service;

use App\Models\IT\Department;
use App\Services\BaseService;
use App\Services\IT\Interfaces\DepartmentServiceInterface;
use Illuminate\Database\Eloquent\Builder;

class DepartmentService extends BaseService implements DepartmentServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Department $model
     */
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Department::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
