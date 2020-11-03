<?php

namespace App\Http\Controllers\IT;

use App\Enum\TransactionTypeEnum;
use Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\FormSearches\RequisitionFormSearch;
use App\Http\Requests\IT\RequisitionFormRequest;
use App\Services\IT\Interfaces\AccessoriesServiceInterface;
use App\Services\IT\Interfaces\TransactionsServiceInterface;
use App\Services\IT\Interfaces\UserServiceInterface;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionTransactionController extends Controller
{
    protected $accessoriesService;
    protected $transactionsService;
    protected $userService;
    public function __construct(
        AccessoriesServiceInterface $accessoriesServiceInterface,
        TransactionsServiceInterface $transactionsServiceInterface,
        UserServiceInterface $userServiceInterface
    ) {
        $this->accessoriesService = $accessoriesServiceInterface;
        $this->transactionsService = $transactionsServiceInterface;
        $this->userService = $userServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $transactions = $this->transactionsService->transactionType(TransactionTypeEnum::R);
            $formSearch = new RequisitionFormSearch();
            if ($request->all()) {
                $formSearch->access_id = $request->access_id;
                $formSearch->s_created_at = $request->s_created_at;
                $formSearch->e_created_at = $request->e_created_at;
                if (isset($request->access_id)) {
                    $transactions->where('access_id', $request->access_id);
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
            $accessories = $this->accessoriesService->all()->get();
            return \view('it.requisition.list', \compact('formSearch'))->with('transactions', $transactions->orderBy('created_at', 'desc')->paginate(10)->appends((array) $formSearch))->with('accessories', $accessories);
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
            return \view('it.requisition.create')->with('accessories', $this->accessoriesService->all()->get())->with('users', $this->userService->all()->get());
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
    public function store(RequisitionFormRequest $request)
    {
        try {
            // qty - 
            $input = array_merge($request->all(), ['trans_type' => TransactionTypeEnum::R, 'created_by' => Auth::user()->id]);
            $input['qty'] = '-' . $request->qty;
            if (!$this->transactionsService->create($input)) {
                $request->session()->flash('error', 'error create!');
            } else {
                $request->session()->flash('success',  ' has been create');
            }
            return \redirect()->route('it.requisition.index');
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
            $accessories = $this->accessoriesService->all()->get();
            $transaction = $this->transactionsService->find($id);
            $users = $this->userService->all()->get();
            return \view('it.requisition.edit')->with('transaction', $transaction)->with('accessories', $accessories)->with('users', $users);
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
    public function update(RequisitionFormRequest $request, $id)
    {
        try {
            if (!is_null($request->ref_no)) {
                $token = Helper::makeRandomTokenKey();
                $transaction = $this->transactionsService->find($id);

                if ($transaction->ref_no) {
                    $request->session()->flash('error', 'รายการเคยยกเลิกแล้ว!');
                    return \redirect()->route('it.requisition.index');
                }
                $transaction->ref_no = $token;

                // $transaction->qty +
                if (!$this->transactionsService->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->trans_type = TransactionTypeEnum::CR;
                    $transaction->qty = substr($transaction->qty, 1);
                    $transaction->created_by = Auth::user()->id;
                    if (!$this->transactionsService->create($transaction->attributesToArray())) {
                        $request->session()->flash('error', 'error update!');
                    } else {
                        $request->session()->flash('success',  ' has been update');
                    }
                }
            }
            return \redirect()->route('it.requisition.index');
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
