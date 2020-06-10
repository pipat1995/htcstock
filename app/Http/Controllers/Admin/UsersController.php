<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->middleware(['auth', 'verified']);
        $this->userRepository = $userRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userRepository->all();
            return \view('admin.users.index', \compact('users'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // ตรวจสอบ Role Gate::denies('edit-users') จาก AuthServiceProvider
            if (Gate::denies('edit-users')) {
                return \redirect()->route('admin.users.index');
            }
            return \view('admin.users.edit')->with([
                'user' => $this->userRepository->edit($id),
                'roles' => Role::all()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $result = $this->userRepository->update($request, $id);
            if ($result->exists) {
                $request->session()->flash('success', $result->name . ' has been update');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
            return \redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // ตรวจสอบ Role Gate::denies('delete-users') จาก AuthServiceProvider
            if (Gate::denies('delete-users')) {
                return \redirect()->route('admin.users.index');
            }
            $result = $this->userRepository->delete($id);
            $request = new Request();
            if ($result->exists) {
                $request->session()->flash('success', ' has been delete');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
            return \redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
