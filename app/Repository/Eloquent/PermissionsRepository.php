<?php

namespace App\Repository\Eloquent;

use App\Permission;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\PermissionsRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class PermissionsRepository extends BaseRepository implements PermissionsRepositoryInterface
{
    /**
     * PermissionRepository constructor.
     *
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Permission::whereNotNull('id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id): bool
    {
        try {
            $permission = Permission::find($id);
            $permission->roles()->detach();
            return $permission->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
