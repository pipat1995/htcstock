<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyFormRequest;
use App\Http\Requests\LendingsFormRequest;
use App\Http\Requests\RequisitionFormRequest;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
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

    public function buyIndex()
    {
        try {
            $transactions = $this->transactionsRepo->buyAll();
            return \view('pages.buys.list')->with('transactions', $transactions);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyCreate()
    {
        try {
            return \view('pages.buys.create')->with('accessories', $this->accessoriesRepo->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyStore(BuyFormRequest $request)
    {
        try {
            if (!$this->transactionsRepo->create(array_merge($request->all(), ['trans_type' => 0, 'trans_by' => Auth::user()->id, 'created_by' => Auth::user()->id]))) {
                $request->session()->flash('error', 'error create!');
            } else {
                $request->session()->flash('success',  ' has been create');
            }
            return \redirect()->route('transactions.buy.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyEdit(String $id)
    {
        try {
            $accessories = $this->accessoriesRepo->all();
            $transaction = $this->transactionsRepo->find($id);
            return \view('pages.buys.edit')->with('transaction', $transaction)->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyUpdate(BuyFormRequest $request, $id)
    {
        try {
            if (!is_null($request->ref_no)) {
                $token = $this->transactionsRepo->makeRandomTokenKey();
                $transaction = $this->transactionsRepo->find($id);
                if ($transaction->ref_no) {
                    $request->session()->flash('error', 'รายการเคยยกเลิกแล้ว!');
                    return \redirect()->route('transactions.buy.list');
                }
                $transaction->ref_no = $token;
                $transaction->trans_type = 1;
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->qty = '-' . $transaction->qty;
                    if (!$this->transactionsRepo->create($transaction->attributesToArray())) {
                        $request->session()->flash('error', 'error update!');
                    } else {
                        $request->session()->flash('success',  ' has been update');
                    }
                }
            }
            return \redirect()->route('transactions.buy.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function requisitionIndex()
    {
        try {
            $transactions = $this->transactionsRepo->requisitionAll();

            return \view('pages.requisition.list')->with('transactions', $transactions);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function requisitionCreate()
    {
        try {
            return \view('pages.requisition.create')->with('accessories', $this->accessoriesRepo->all())->with('users', $this->userRepository->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function requisitionStore(RequisitionFormRequest $request)
    {
        try {
            // qty - 
            $input = array_merge($request->all(), ['trans_type' => 4, 'created_by' => Auth::user()->id]);
            $input['qty'] = '-' . $request->qty;
            if (!$this->transactionsRepo->create($input)) {
                $request->session()->flash('error', 'error create!');
            } else {
                $request->session()->flash('success',  ' has been create');
            }
            return \redirect()->route('transactions.requisition.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function requisitionEdit(String $id)
    {
        try {
            $accessories = $this->accessoriesRepo->all();
            $transaction = $this->transactionsRepo->find($id);
            $users = $this->userRepository->all();
            return \view('pages.requisition.edit')->with('transaction', $transaction)->with('accessories', $accessories)->with('users', $users);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function requisitionUpdate(RequisitionFormRequest $request, $id)
    {
        try {
            if (!is_null($request->ref_no)) {
                $token = $this->transactionsRepo->makeRandomTokenKey();
                $transaction = $this->transactionsRepo->find($id);
                
                if ($transaction->ref_no) {
                    $request->session()->flash('error', 'รายการเคยยกเลิกแล้ว!');
                    return \redirect()->route('transactions.requisition.list');
                }
                $transaction->ref_no = $token;
                $transaction->trans_type = 5;
                // $transaction->qty +
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->qty = substr($transaction->qty,1);
                    $transaction->created_by = Auth::user()->id;
                    if (!$this->transactionsRepo->create($transaction->attributesToArray())) {
                        $request->session()->flash('error', 'error update!');
                    } else {
                        $request->session()->flash('success',  ' has been update');
                    }
                }
            }
            return \redirect()->route('transactions.requisition.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendingsIndex()
    {
        try {
            $transactions = $this->transactionsRepo->lendingsAll();

            return \view('pages.lendings.list')->with('transactions', $transactions);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendingsCreate()
    {
        try {
            return \view('pages.lendings.create')->with('accessories', $this->accessoriesRepo->all())->with('users', $this->userRepository->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendingsStore(LendingsFormRequest $request)
    {
        try {
            // qty - 
            $input = array_merge($request->all(), ['trans_type' => 2, 'created_by' => Auth::user()->id]);
            $input['qty'] = '-' . $request->qty;
            if (!$this->transactionsRepo->create($input)) {
                $request->session()->flash('error', 'error create!');
            } else {
                $request->session()->flash('success',  ' has been create');
            }
            return \redirect()->route('transactions.lendings.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function lendingsEdit(String $id)
    {
        try {
            $accessories = $this->accessoriesRepo->all();
            $transaction = $this->transactionsRepo->find($id);
            $users = $this->userRepository->all();
            return \view('pages.lendings.edit')->with('transaction', $transaction)->with('accessories', $accessories)->with('users', $users);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendingsUpdate(RequisitionFormRequest $request, $id)
    {
        try {
            if (!is_null($request->ref_no)) {
                $token = $this->transactionsRepo->makeRandomTokenKey();
                $transaction = $this->transactionsRepo->find($id);
                
                if ($transaction->ref_no) {
                    $request->session()->flash('error', 'รายการคืนแล้ว!');
                    return \redirect()->route('transactions.requisition.list');
                }
                $transaction->ref_no = $token;
                $transaction->trans_type = 3;
                // $transaction->qty +
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->qty = substr($transaction->qty,1);
                    $transaction->created_by = Auth::user()->id;
                    if (!$this->transactionsRepo->create($transaction->attributesToArray())) {
                        $request->session()->flash('error', 'error update!');
                    } else {
                        $request->session()->flash('success',  ' has been update');
                    }
                }
            }
            return \redirect()->route('transactions.lendings.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
