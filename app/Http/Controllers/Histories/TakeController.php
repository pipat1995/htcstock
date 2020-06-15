<?php

namespace App\Http\Controllers\Histories;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class TakeController extends Controller
{
    private $historiesRepository;
    private $userRepository;
    public function __construct(HistoriesRepositoryInterface $historiesRepositoryInterface, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->historiesRepository = $historiesRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userRepository->allNgacUserinfo();
            $histories = $this->historiesRepository->convertHistoriesUserInfo($this->historiesRepository->takeAll(), $users);
            return \view('histories.take')->with(['histories' => $histories]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'access_id' => 'required',
                'qty' => 'required',
                'user_lending' => 'required'
            ]);
            $histories = $this->historiesRepository->takeStore($request);
            if ($histories->exists) {
                $request->session()->flash('success', $histories->name . ' เบิกอุปกรณ์แล้ว!');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
            return \redirect()->route('take.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $histories = $this->historiesRepository->historieEdit($id);
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $histories = $this->historiesRepository->historieEdit($id);
            $result = $this->historiesRepository->takeUpdate($histories, $id);
            return \redirect()->route('take.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $histories = $this->historiesRepository->delete($id);
            return \redirect()->route('take.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
