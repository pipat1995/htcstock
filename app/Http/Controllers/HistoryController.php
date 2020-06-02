<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct() {
        
    }
    public function take()
    {
        return \view('take');
    }
    public function storeTake(Request $request)
    {
        \dd($request->all());
    }
    public function lend()
    {
        return \view('lend');
    }
}
