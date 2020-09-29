<?php

namespace App\Http\Controllers\IT;

use App\Enum\TransactionTypeEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\FormSearches\BuyFormSearch;
use App\Http\Requests\BuyFormRequest;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyTransactionController extends Controller
{
    protected $accessoriesRepo;
    protected $transactionsRepo;
    protected $userRepository;
    public function __construct(
        AccessoriesRepositoryInterface $accessoriesRepositoryInterface,
        TransactionsRepositoryInterface $transactionsRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface
    ) {
        $this->accessoriesRepo = $accessoriesRepositoryInterface;
        $this->transactionsRepo = $transactionsRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formSearch = new BuyFormSearch();
        try {
            $transactions = $this->transactionsRepo->transactionType(TransactionTypeEnum::B);
            if ($request->all()) {
                $formSearch->access_id = $request->access_id;
                $formSearch->ir_no = $request->ir_no;
                $formSearch->po_no = $request->po_no;
                $formSearch->s_created_at = $request->s_created_at;
                $formSearch->e_created_at = $request->e_created_at;
                if (isset($request->access_id)) {
                    $transactions->where('access_id', $formSearch->access_id);
                }
                if (isset($request->ir_no)) {
                    $transactions->where('ir_no', 'like', '%' . $formSearch->ir_no . '%');
                }
                if (isset($request->po_no)) {
                    $transactions->where('po_no', 'like', '%' . $formSearch->po_no . '%');
                }
                if (isset($request->s_created_at)) {
                    $s_date = new DateTime($request->s_created_at);
                    if (isset($request->e_created_at)) {
                        $e_date = new DateTime($request->e_created_at);
                        $e_date->add(new DateInterval('P1D'));
                        $transactions->whereBetween('created_at', [$s_date->format('Y-m-d H:i:s'), $e_date->format('Y-m-d H:i:s')]);
                    } else {
                        $new_s_date = new DateTime($request->s_created_at);
                        $new_s_date->add(new DateInterval('P1D'));
                        $transactions->whereBetween('created_at', [$s_date->format('Y-m-d H:i:s'), $new_s_date->format('Y-m-d H:i:s')]);
                    }
                }
            }
            $accessories = $this->accessoriesRepo->all()->get();
            $datas = $transactions->orderBy('created_at', 'desc')->paginate(10)->appends((array) $formSearch);
            return \view('it.buys.list', \compact('formSearch'))->with('transactions', $datas)->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return \view('it.buys.create')->with('accessories', $this->accessoriesRepo->all()->get());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyFormRequest $request)
    {
        try {
            $attributes = array_merge($request->except(['_token']), ['trans_type' => TransactionTypeEnum::B, 'trans_by' => Auth::user()->id, 'created_by' => Auth::user()->id]);
            $create = $this->transactionsRepo->create($attributes);
            if (!$create) {
                $request->session()->flash('error', 'error create!');
                return \back();
            } 
            $request->session()->flash('success',  ' has been create');
            return \redirect()->route('it.buy.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $accessories = $this->accessoriesRepo->all()->get();
            $transaction = $this->transactionsRepo->find($id);
            return \view('it.buys.edit')->with('transaction', $transaction)->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuyFormRequest $request, $id)
    {
        try {
            $token = Helper::makeRandomTokenKey();
            $transaction = $this->transactionsRepo->find($id);
            if (!is_null($request->ref_no)) {

                // ตรวจสอบ stock ว่าเหลือเท่าตอนซื้อ
                if ($this->transactionsRepo->quantityAccessorie($transaction->access_id)->quantity < $transaction->qty) {
                    $request->session()->flash('error', 'มีของในคลังไม่พอให้ยกเลิก!');
                    return \back();
                }
                // ตรวจสอบ Ref_no
                if ($transaction->ref_no) {
                    $request->session()->flash('error', 'รายการเคยยกเลิกแล้ว!');
                    return \back();
                }
                $transaction->ref_no = $token;
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->trans_type = TransactionTypeEnum::CB;
                    $transaction->qty = '-' . $transaction->qty;
                    if (!$this->transactionsRepo->create($transaction->attributesToArray())) {
                        $request->session()->flash('error', 'error update!');
                    } else {
                        $request->session()->flash('success',  ' has been update');
                    }
                }
            } else {
                $request->session()->flash('error', 'ไม่ให้แก้ไข!');
                return \back();
            }
            return \redirect()->route('it.buy.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
