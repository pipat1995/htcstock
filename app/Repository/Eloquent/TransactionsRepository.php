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
            return Transactions::select('id', 'access_id', 'qty', 'ir_no', 'po_no', 'trans_by', 'created_at','created_by');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyAll(): Builder
    {
        try {
            return Transactions::select('id', 'access_id', 'qty', 'ir_no', 'po_no', 'trans_by', 'created_at')->whereIn('trans_type', [0])->whereNull('ref_no');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function requisitionAll(): Builder
    {
        try {
            return Transactions::select('id', 'access_id', 'qty', 'ir_no', 'po_no', 'trans_by', 'created_at')->whereIn('trans_type', [4])->whereNull('ref_no');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function lendingsAll(): Builder
    {
        try {
            return Transactions::select('id', 'access_id', 'qty', 'ir_no', 'po_no', 'trans_by', 'created_at')->whereIn('trans_type', [2])->whereNull('ref_no');
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

    public function stock(): Builder
    {
        try {
            return Transactions::select('access_id' ,DB::raw('sum(qty) as quantity'))->groupBy('access_id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function howMuchAccessorie(String $id)
    {
        try {
            return Transactions::select('access_id' ,DB::raw('sum(qty) as quantity'))->groupBy('access_id')->where('access_id',$id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAccessoriesLeading()
    {
        try {
            return Transactions::select('access_id' ,DB::raw('sum(qty) as quantity'))->groupBy('access_id')->whereIn('trans_type', [2]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAccessoriesRequisition()
    {
        try {
            return Transactions::select('access_id' ,DB::raw('sum(qty) as quantity'))->groupBy('access_id')->whereIn('trans_type', [4]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
