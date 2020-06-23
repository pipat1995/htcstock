<?php

namespace App\Repository\Eloquent;

use App\Repository\TransactionsRepositoryInterface;
use App\Transactions;
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

    public function buyAll()
    {
        try {
            return Transactions::whereIn('trans_type', [0])->whereNull('ref_no')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function requisitionAll()
    {
        try {
            return Transactions::whereIn('trans_type', [4])->whereNull('ref_no')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function lendingsAll()
    {
        try {
            return Transactions::whereIn('trans_type', [2])->whereNull('ref_no')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function makeRandomTokenKey(): String
    {
        try {
            return Str::random(32);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
