<?php

namespace App\Http\Controllers\IT;

use App\Enum\TransactionTypeEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\FormSearches\BudgetFormSearch;
use App\Http\Requests\BudgetFormRequest;
use App\Repository\BudgetRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BudgetController extends Controller
{
    protected $budgetRepository;
    protected $transactionsRepository;
    public function __construct(BudgetRepositoryInterface $budgetRepositoryInterface, TransactionsRepositoryInterface $transactionsRepositoryInterface)
    {
        $this->budgetRepository = $budgetRepositoryInterface;
        $this->transactionsRepository = $transactionsRepositoryInterface;
    }

    public function index(Request $request)
    {
        try {
            $budgets = $this->budgetRepository->all();
            $formSearch = new BudgetFormSearch();
            if ($request->all()) {
                $formSearch->month = $request->month;
                $formSearch->year = $request->year;
                if ($formSearch->month) {
                    $budgets->where('month', $formSearch->month);
                }
                if ($formSearch->year) {
                    $budgets->where('year', $formSearch->year);
                }
            }
            $budgets->orderBy('created_at', 'desc');
            return \view('it.budgets.index')->with(
                [
                    'formSearch' => $formSearch,
                    'budgets' => $budgets->paginate(10)->appends((array) $formSearch),
                    'months' => Helper::getMonth(),
                    'earliest_year' => 2020
                ]
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budgets  $user
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return \view('it.budgets.create')->with(['months' => Helper::getMonth(), 'earliest_year' => 2020]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budgets  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $budget = $this->budgetRepository->find($id);
            $datas = $this->transactionsRepository->transactionType(TransactionTypeEnum::B)->whereMonth('created_at', $budget->month)->whereYear('created_at', $budget->year)->get();
            
            $tempAmt = 0;
            $amountTotal = 0;
            foreach ($datas as $key => $value) {
                $value->amount = $value->unit_cost * $value->qty;
                $amountTotal += $value->amount;
                $value->amt = $tempAmt += $value->amount;
            }
            return \view('it.budgets.edit')->with([
                'budget' => $budget,
                'transactions' => $datas,
                'amountTotal' => $amountTotal,
                'remainBudget' => $budget->budgets_of_month - $amountTotal
            ]);
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
    public function store(BudgetFormRequest $request)
    {
        try {
            if ($this->budgetRepository->hasBudget($request->month, $request->year)) {
                $request->session()->flash('error', 'มี Budget ของเดือนนี้แล้ว!');
                return \redirect()->route('it.budgets.index');
            }
            if ($this->budgetRepository->create($request->all())) {
                $request->session()->flash('success', ' Budget create success!');
            } else {
                $request->session()->flash('error', 'error budget create!');
            }
            return \redirect()->route('it.budgets.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Budgets  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(BudgetFormRequest $request, $id)
    {
        try {
            if (Gate::denies('for-superadmin-admin')) {
                return \redirect()->route('logout');
            }
            $budget = $this->budgetRepository->find($id);
            $budget->budgets_of_month = $request->budgets_of_month;
            if ($this->budgetRepository->update($budget->attributesToArray(), $id)) {
                $request->session()->flash('success', ' budget has been update');
            } else {
                $request->session()->flash('error', 'error budget update!');
            }
            return \redirect()->route('it.budgets.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budgets  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
