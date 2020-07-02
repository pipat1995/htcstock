<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Http\FormSearches\BuyFormSearch;
use App\Http\FormSearches\LendingsFormSearch;
use App\Http\FormSearches\ReportFormSearch;
use App\Http\FormSearches\RequisitionFormSearch;
use App\Http\Requests\BuyFormRequest;
use App\Http\Requests\LendingsFormRequest;
use App\Http\Requests\RequisitionFormRequest;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
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

    public function buyIndex(Request $request)
    {
        try {
            $formSearch = new BuyFormSearch();
            $transactions = $this->transactionsRepo->transactionType(0);
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
            return \view('pages.buys.list', \compact('formSearch'))->with('transactions', $datas)->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function buyCreate()
    {
        try {
            return \view('pages.buys.create')->with('accessories', $this->accessoriesRepo->all()->get());
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
            $accessories = $this->accessoriesRepo->all()->get();
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
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->trans_type = 1;
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

    public function requisitionIndex(Request $request)
    {
        try {
            $transactions = $this->transactionsRepo->transactionType(4);
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
            $accessories = $this->accessoriesRepo->all()->get();
            return \view('pages.requisition.list',\compact('formSearch'))->with('transactions', $transactions->orderBy('created_at', 'desc')->paginate(10)->appends((array) $formSearch))->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function requisitionCreate()
    {
        try {
            return \view('pages.requisition.create')->with('accessories', $this->accessoriesRepo->all()->get())->with('users', $this->userRepository->all()->get());
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
            $accessories = $this->accessoriesRepo->all()->get();
            $transaction = $this->transactionsRepo->find($id);
            $users = $this->userRepository->all()->get();
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

                // $transaction->qty +
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->trans_type = 5;
                    $transaction->qty = substr($transaction->qty, 1);
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

    public function lendingsIndex(Request $request)
    {
        try {
            $transactions = $this->transactionsRepo->transactionType(2);
            $formSearch = new LendingsFormSearch();
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
            $accessories = $this->accessoriesRepo->all()->get();
            return \view('pages.lendings.list',\compact('formSearch'))->with('transactions', $transactions->orderBy('created_at', 'desc')->paginate(10)->appends((array) $formSearch))->with('accessories', $accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendingsCreate()
    {
        try {
            return \view('pages.lendings.create')->with('accessories', $this->accessoriesRepo->all()->get())->with('users', $this->userRepository->all()->get());
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
            $accessories = $this->accessoriesRepo->all()->get();
            $transaction = $this->transactionsRepo->find($id);
            $users = $this->userRepository->all()->get();
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

                // $transaction->qty +
                if (!$this->transactionsRepo->update($transaction->attributesToArray(), $id)) {
                    $request->session()->flash('error', 'error update!');
                } else {
                    $transaction->trans_type = 3;
                    $transaction->qty = substr($transaction->qty, 1);
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
