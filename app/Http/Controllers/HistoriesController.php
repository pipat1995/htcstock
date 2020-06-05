<?php

namespace App\Http\Controllers;

use App\Histories;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class HistoriesController extends Controller
{
    private $historiesRepository;
    private $userRepository;
    public function __construct(HistoriesRepositoryInterface $historiesRepositoryInterface, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->historiesRepository = $historiesRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
        $this->middleware(['auth', 'verified']);
    }
    public function allTake()
    {
        try {
            $histories = $this->historiesRepository->allTake();
            $users = $this->userRepository->allNgacUserinfo();
            foreach ($histories as $key => $value) {
                foreach ($users as $key => $item) {
                    if ($item->id == $value->user_take) {
                        $value->user_take = $item->name;
                    }
                }
                $value->access_id = $value->accessorie->name;
            }
            return \view('take', \compact('histories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeTake(Request $request)
    {
        try {
            $request->validate([
                'validationAccess' => 'required',
                'validationQty' => 'required|integer',
                'validationTakeName' => 'required'
            ]);
            $histories = $this->historiesRepository->storeTake($request);
            if (!$histories->exists) {
                $errors = new MessageBag();
                $errors->add('your_custom_error', 'Your custom error message!');
                return \redirect('histories/take')->withErrors($errors);
            }
            return \redirect('histories/take')->with('create', 'Success!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showTake($histories)
    {
        return $this->historiesRepository->findById($histories);
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
    public function updateTake(Request $request, Histories $histories)
    {
        # code...
    }
    public function lend()
    {
        return \view('lend');
    }
}
