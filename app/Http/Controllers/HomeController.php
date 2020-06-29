<?php

namespace App\Http\Controllers;

use App\Repository\TransactionsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $transactionsRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionsRepositoryInterface $transactionsRepositoryInterface)
    {
        $this->transactionsRepository = $transactionsRepositoryInterface;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leading = 0;
        $requisition = 0;
        $leadingQty = $this->transactionsRepository->getAccessoriesLeading()->first();
        $requisitionQty = $this->transactionsRepository->getAccessoriesRequisition()->first();
        if ($leadingQty) {
            $leading = substr($leadingQty->quantity, 1);
        }
        if ($requisitionQty) {
            $requisition = substr($requisitionQty->quantity, 1);
        }

        return view('pages.home')->with(['leadingTotal' => $leading, 'requisitionTotal' => $requisition]);
    }
}
