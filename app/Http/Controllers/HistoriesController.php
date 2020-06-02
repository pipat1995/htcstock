<?php

namespace App\Http\Controllers;

use App\Histories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class HistoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function take()
    {
        return \view('take');
    }
    public function storeTake(Request $request)
    {
        try {
            $request->validate([
                'validationAccess' => 'required',
                'validationQty' => 'required|integer',
                'validationTakeName' => 'required'
            ]);
            $data = Histories::firstOrNew([
                'access_id' => $request->validationAccess,
                'qty' => $request->validationQty,
                'user_take' => $request->validationTakeName,
                'status' => \config('enums.histories_types.TAKE'),
                // Auth::user()->id  คือ ID table users ที่ใช้งานอยู่
                'create_by' => (int) Auth::user()->id
            ]);
            $data->save();
            if (!$data->exists) {
                $errors = new MessageBag();
                $errors->add('your_custom_error', 'Your custom error message!');
                return \redirect('histories/take')->withErrors($errors);
            }
            return \redirect('histories/take')->with('create', 'Success!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showTake(Histories $histories)
    {
        return $histories;
    }
    public function editTake(Histories $histories)
    {
        return $histories;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function updateTake(Request $request,Histories $histories)
    {
        # code...
    }
    public function lend()
    {
        return \view('lend');
    }
}
