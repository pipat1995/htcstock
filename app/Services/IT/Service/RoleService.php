<?php

namespace App\Services\IT\Service;

use App\Models\IT\Role;
use App\Services\BaseService;
use App\Services\IT\Interfaces\RoleServiceInterface;
use Illuminate\Database\Eloquent\Builder;

class RoleService extends BaseService implements RoleServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Role::whereNotNull('id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id): bool
    {
        try {
            $user = Role::find($id);
            $user->roles()->detach();
            return $user->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
