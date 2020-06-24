<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use stdClass;

class ReportController extends Controller
{
    protected $transactionsRepository;
    protected $accessoriesRepository;
    public $accessories;
    public function __construct(TransactionsRepositoryInterface $transactionsRepositoryInterface, AccessoriesRepositoryInterface $accessoriesRepositoryInterface)
    {
        $this->transactionsRepository = $transactionsRepositoryInterface;
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->accessories = $this->accessoriesRepository->all();
    }

    public function reportAccessories(Request $request)
    {
        try {
            // \dd($request->all());
            $obj = new stdClass();
            $obj->access_id = $request->access_id;
            $obj->s_created_at = $request->s_created_at;
            $obj->e_created_at = $request->e_created_at;
            $input = $obj;
            $transactions = $this->transactionsRepository->filter();
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
            return \view('pages.reports.list', \compact('input'))->with('transactions', $transactions->paginate(10)->appends((array) $input))->with('accessories', $this->accessories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
