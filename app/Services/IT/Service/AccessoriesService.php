<?php

namespace App\Services\IT\Service;

use App\Models\IT\Accessories;
use App\Services\BaseService;
use App\Services\IT\Interfaces\AccessoriesServiceInterface;
use Illuminate\Database\Eloquent\Builder;

class AccessoriesService extends BaseService implements AccessoriesServiceInterface
{
    /**
     * UserService constructor.
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

    public function sumAccessories()
    {
        try {
            return Accessories::addSelect(['totals' => function ($query) {
                $query->selectRaw('SUM(transactions.qty) as total')
                    ->from('transactions')
                    ->whereColumn('access_id', 'accessories.access_id');
            }]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
