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
        try {
            $leadingQty = $this->transactionsRepository->getAccessoriesType(2);
            $requisitionQty = $this->transactionsRepository->getAccessoriesType(4);
            if ($leadingQty) {
                $leading = \substr($leadingQty->quantity,1);
            }
            if ($requisitionQty) {
                $requisition = \substr($requisitionQty->quantity,1);
            }

            return view('pages.home')->with(['leadingTotal' => $leading, 'requisitionTotal' => $requisition]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
