<?php

namespace App\Repository\Eloquent;

use App\Accessories;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
            return Accessories::select('access_id', 'access_name', 'unit');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request): Model
    {
        try {
            $accessories = Accessories::firstOrNew(['name' => $request->name, 'unit' => $request->unit]);
            $accessories->save();
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(String $id)
    {
        try {
            $accessories = Accessories::find($id);
            return $accessories->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
