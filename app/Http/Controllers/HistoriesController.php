<?php

namespace App\Http\Controllers;

use App\Histories;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
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
            $users = $this->userRepository->allNgacUserinfo();
            $histories = $this->convertHistoriesUserInfo($this->historiesRepository->allTake(), $users);
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
            $request->status = \config('enums.histories_types.TAKE');
            $histories = $this->historiesRepository->store($request);
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

    public function editTake($histories)
    {
        return $this->historiesRepository->findById($histories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function updateTake(Request $request, $histories)
    {
        # code...
    }

    public function allLend()
    {
        try {

            $users = $this->userRepository->allNgacUserinfo();
            $histories = $this->convertHistoriesUserInfo($this->historiesRepository->allLend(), $users);
            return \view('lend', \compact('histories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storeLend(Request $request)
    {
        try {
            $request->validate([
                'validationAccess' => 'required',
                'validationQty' => 'required|integer',
                'validationLendName' => 'required'
            ]);
            $request->status = \config('enums.histories_types.LEND');
            $histories = $this->historiesRepository->store($request);
            if (!$histories->exists) {
                $errors = new MessageBag();
                $errors->add('your_custom_error', 'Your custom error message!');
                return \redirect('histories/lend')->withErrors($errors);
            }
            return \redirect('histories/lend')->with('create', 'Success!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function convertHistoriesUserInfo($histories, $users)
    {
        foreach ($histories as $value) {
            foreach ($users as $item) {
                if ($item->id == $value->user_lend) {
                    $value->user_lend = $item->name;
                }
                if ($item->id == $value->user_take) {
                    $value->user_take = $item->name;
                }
            }
            $value->access_id = $value->accessorie->name;
        }
        return $histories;
    }
}
