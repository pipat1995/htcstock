<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**      
     * @var Model      
     */
    protected $model;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        try {
            return $this->model->create($attributes);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @param $id
     * @return Model
     */
    public function find(int $id): Model
    {
        try {
            return $this->model->find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @param array $attributes
     *
     * @return bool
     */
    public function update(array $attributes, int $id): bool
    {
        try {
            $model = $this->model->find($id);
            return $model->update($attributes);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(int $id)
    {
        try {
            return $this->model->destroy($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
