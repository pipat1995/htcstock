<?php

namespace App\Services\IT\Service;

use App\Models\System;
use App\Services\BaseService;
use App\Services\IT\Interfaces\SystemServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SystemService extends BaseService implements SystemServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param System $model
     */
    public function __construct(System $model)
    {
        parent::__construct($model);
    }

    public function delete($id): bool
    {
        try {
            $user = System::find($id);
            $user->Systems()->detach();
            return $user->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function dropdown(...$slug): Collection
    {
        try {
            if ($slug) {
                return System::whereNotIn('slug',...$slug)->get();
            } else {
                return System::all();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filter(Request $request)
    {
        return System::filter($request)->paginate(10);
    }

    public function systemIn(...$slug): Collection
    {
        try {
            return System::whereIn('slug',...$slug)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
