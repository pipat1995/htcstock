<?php

namespace App\Http\Controllers\API;

use App\Accessories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AccessoriesController extends Controller
{
    public function index()
    {
        return DataTables::of(Accessories::all())
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $btn = '<botton class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-param="' . $row->id . '">ข้อมูล</botton>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
