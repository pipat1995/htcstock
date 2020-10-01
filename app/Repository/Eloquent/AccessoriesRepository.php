<?php

namespace App\Repository\Eloquent;

use App\Accessories;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Transactions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
