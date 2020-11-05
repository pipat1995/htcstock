<?php

namespace App\Services\IT\Service;

use App\Services\BaseService;
use App\Services\IT\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserService extends BaseService implements UserServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return User::whereNotNull('username');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id): bool
    {
        try {
            $user = User::find($id);
            $user->roles()->detach();
            return $user->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropdownUser(): Collection
    {
        try {
            return User::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
