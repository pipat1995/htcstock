<?php

namespace App\Http\Controllers\Histories;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TakeRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class TakeController extends Controller
{
    private $takeRepository;
    private $userRepository;
    public function __construct(TakeRepositoryInterface $takeRepositoryInterface, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->takeRepository = $takeRepositoryInterface;
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
            $histories = $this->convertHistoriesUserInfo($this->takeRepository->all(), $users);
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
                'user_take' => 'required'
            ]);
            $histories = $this->takeRepository->store($request);
            if (!$histories->exists) {
            }
            return \redirect()->route('take.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $histories = $this->takeRepository->edit($id);
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
            $histories = $this->takeRepository->update($request, $id);
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
            $histories = $this->takeRepository->delete($id);
            return \redirect()->route('take.index');
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
            // $value->access_id = $value->accessorie->name;
        }
        return $histories;
    }
}
