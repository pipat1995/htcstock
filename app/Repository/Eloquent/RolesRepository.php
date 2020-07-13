<?php

namespace App\Repository\Eloquent;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\RolesRepositoryInterface;
use App\Roles;
use Illuminate\Database\Eloquent\Builder;

class RolesRepository extends BaseRepository implements RolesRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Roles $model
     */
    public function __construct(Roles $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Roles::select('id', 'name');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id): bool
    {
        try {
            $user = Roles::find($id);
            $user->roles()->detach();
            return $user->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
