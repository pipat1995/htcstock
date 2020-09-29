<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FormSearches\UserFormSearch;
use App\Repository\RoleRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    private $userRepository;
    private $rolesRepository;
    public function __construct(UserRepositoryInterface $userRepositoryInterface, RoleRepositoryInterface $rolesRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
        $this->rolesRepository = $rolesRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $users = $this->userRepository->all();
            $formSearch = new UserFormSearch();
            if ($request->all()) {
                $formSearch->search = $request->search;
                $users->where('name', 'like', '%' . $formSearch->search . '%')
                    ->orWhere('username', 'like', '%' . $formSearch->search . '%')
                    ->orWhere('email', 'like', '%' . $formSearch->search . '%');
            }
            // \dd($users->get()[0]->department);
            return \view('admin.users.index', \compact('formSearch'))->with(['users' => $users->paginate(10)->appends((array) $formSearch)]);
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
            if (Gate::denies('for-superadmin-admin')) {
                return \redirect()->route('admin.users.index');
            }
            return \view('admin.users.edit')->with([
                'user' => $this->userRepository->find($id),
                'roles' => $this->rolesRepository->all()->get()
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
        $request->validate([
            'name' => 'required',
            'roles' => 'required|nullable',
        ]);

        try {
            $user = $this->userRepository->find($id);
            if ($this->userRepository->update(['name' => $request->name], $id)) {
                $user->roles()->sync($request->roles);
                $request->session()->flash('success', $user->name . ' user has been update');
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
    public function destroy(Request $request, $id)
    {
        try {
            // denies คือ !=
            // allows คือ ==
            // ตรวจสอบ Role Gate::denies('for-superadmin') จาก AuthServiceProvider ถ้าไม่ใช้ Admin 
            if (Gate::denies('for-superadmin')) {
                return \redirect()->route('admin.users.index');
            }
            if ($this->userRepository->delete($id)) {
                $request->session()->flash('success', ' has been delete');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
            return \redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateusers(Request $request)
    {
        try {
            if (Gate::denies('for-superadmin-admin')) {
                return back();
            }
            $username = [];
            $users = $this->userRepository->all()->get();
            foreach ($users as $key => $value) {
                \array_push($username, $value->username);
            }
            $results = Http::get(ENV('USERS_UPDATE'), ['usernames' => $username])->json();
            if (count($results) <= 0) {
                $request->session()->flash('success', 'has been update user');
                return back();
            }
            $role = $this->rolesRepository->all()->where('name', 'user')->first();
            foreach ($results as $key => $value) {
                $user = $this->userRepository->create([
                    'name' => $value['name'],
                    'username' => $value['username'],
                    'email' => $value['email'],
                    'password' => Hash::make(\substr($value['email'], 0, 1) . $value['username'])
                ]);
                if (!$user) {
                    $request->session()->flash('error', 'error update username' . $value['username']);
                    return back();
                }
                $user->roles()->attach($role);
            }
            $request->session()->flash('success', 'has been update user');
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
