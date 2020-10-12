<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\Controller;
use App\Http\FormSearches\TransactionsFormSearch;
use App\Services\IT\Interfaces\AccessoriesServiceInterface;
use App\Services\IT\Interfaces\TransactionsServiceInterface;
use Barryvdh\DomPDF\Facade as PDF;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $transactionsService;
    protected $accessoriesService;
    public $accessories;
    public function __construct(TransactionsServiceInterface $transactionsServiceInterface, AccessoriesServiceInterface $accessoriesServiceInterface)
    {
        $this->transactionsService = $transactionsServiceInterface;
        $this->accessoriesService = $accessoriesServiceInterface;
        $this->accessories = $this->accessoriesService->all()->get();
    }

    public function reportTransactions(Request $request)
    {
        try {
            $formSearch = new TransactionsFormSearch();
            $transactions = $this->transactionsService->all();
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
            $transactions->orderBy('created_at', 'desc');
            return \view('it.reports.transactions', \compact('formSearch'))->with([
                'transactions' => $transactions->paginate(10)->appends((array) $formSearch),
                'accessories' => $this->accessories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function reportStocks(Request $request)
    {
        try {
            $formSearch = new TransactionsFormSearch();
            $transactions = $this->transactionsService->stock();
            if ($request->all()) {
                $formSearch->access_id = $request->access_id;
                if (isset($request->access_id)) {
                    $transactions->where('access_id', $request->access_id);
                }
            }
            $transactions->orderBy('quantity', 'desc');
            return \view('it.reports.stocks', \compact('formSearch'))->with([
                'transactions' => $transactions->paginate(10)->appends((array) $formSearch),
                'accessories' => $this->accessories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkStock(int $id)
    {
        try {
            $result = $this->transactionsService->quantityAccessorie($id);
            if (is_null($result)) {
                return response()->json(['message' => "No data transactions"], 200);
            }
            return response()->json(['name' => $result->accessorie->access_name, 'qty' => (int) $result->quantity], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function generateAccessoriesPDF()
    {
        try {
            
            $accessories = $this->accessoriesService->sumAccessories()->get();
            $pdf = PDF::loadView('it.reports.pdf', compact('accessories',$accessories));
            return $pdf->stream();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
