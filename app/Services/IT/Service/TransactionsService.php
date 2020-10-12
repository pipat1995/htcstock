<?php

namespace App\Services\IT\Service;

use App\Models\IT\Transactions;
use App\Services\BaseService;
use App\Services\IT\Interfaces\TransactionsServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TransactionsService extends BaseService implements TransactionsServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param Accessories $model
     */
    public function __construct(Transactions $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Transactions::whereNotNull('id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function transactionType(String $type): Builder
    {
        try {
            return Transactions::whereIn('trans_type', [$type])->whereNull('ref_no');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function stock(): Builder
    {
        try {
            return Transactions::select('access_id', DB::raw('sum(qty) as quantity'))->groupBy('access_id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function quantityAccessorie(int $id)
    {
        try {
            return Transactions::select('access_id', DB::raw('sum(qty) as quantity'))->groupBy('access_id')->where('access_id', $id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAccessoriesType(String $type)
    {
        try {
            return Transactions::select('access_id', DB::raw('sum(qty) as quantity'))->groupBy('access_id')->whereIn('trans_type', [$type])->whereNull('ref_no')->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
