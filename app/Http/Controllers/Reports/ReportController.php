<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $transactionsRepository;
    protected $accessoriesRepository;
    public function __construct(TransactionsRepositoryInterface $transactionsRepositoryInterface,AccessoriesRepositoryInterface $accessoriesRepositoryInterface) {
        $this->transactionsRepository = $transactionsRepositoryInterface;
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
    }

    public function reportAccessories()
    {
        try {
            return \view('pages.reports.list')->with('transactions',$this->transactionsRepository->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function searchReport(Request $request)
    {
        try {
            \dd($request->all());
            $this->transactionsRepository->filterAccessories($request->access_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
