<?php

namespace App\Http\Controllers\API;

use App\Histories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class HistoriesController extends Controller
{
    public function __construct()
    {
    }

    public function take()
    {
        try {
            return DataTables::of(Histories::takeList())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<botton class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#takeModal" data-param="' . $row->id . '">ข้อมูล</botton>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
