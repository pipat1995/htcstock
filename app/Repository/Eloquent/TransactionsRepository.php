<?php

namespace App\Repository\Eloquent;

use App\Repository\TransactionsRepositoryInterface;
use App\Transactions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionsRepository extends BaseRepository implements TransactionsRepositoryInterface
{
    /**
     * UserRepository constructor.
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
            return Transactions::select('id', 'access_id', 'trans_type', 'qty', 'unit_cost', 'ir_no', 'po_no', 'trans_by', 'created_at', 'created_by');
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

    public function howMuchAccessorie(String $id)
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
