<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FormSearches\UserFormSearch;
use App\Models\IT\Role;
use App\Services\IT\Interfaces\DepartmentServiceInterface;
use App\Services\IT\Interfaces\RoleServiceInterface;
use App\Services\IT\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    protected $userService;
    protected $rolesService;
    protected $departmentService;
    public function __construct(
        UserServiceInterface $userServiceInterface,
        RoleServiceInterface $rolesServiceInterface,
        DepartmentServiceInterface $departmentServiceInterface
    ) {
        $this->userService = $userServiceInterface;
        $this->rolesService = $rolesServiceInterface;
        $this->departmentService = $departmentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $users = $this->userService->filter($request);
            $departments = $this->departmentService->dropdown();
            $roles = $this->rolesService->dropdown();
            $query = $request->all();
            $search = $request->search;
            $selectedDept = \collect($request->department);
            $selectedRole = \collect($request->user_role);
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('admin.users.index', \compact('users', 'departments', 'roles', 'search', 'selectedDept', 'selectedRole', 'query'));
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
                'user' => $this->userService->find($id),
                'roles' => $this->rolesService->all()->get()
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
        DB::beginTransaction();
        try {
            $user = $this->userService->find($id);
            if ($this->userService->update(['name' => $request->name], $id)) {
                $user->roles()->sync($request->roles);
                $request->session()->flash('success', $user->name . ' user has been update');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
            return \redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return \redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // denies คือ !=
            // allows คือ ==
            // ตรวจสอบ Role Gate::denies('super-admin') จาก AuthServiceProvider ถ้าไม่ใช้ Admin 
            if (Gate::denies('super-admin')) {
                return \redirect()->route('admin.users.index');
            }
            if ($this->userService->delete($id)) {
                $request->session()->flash('success', ' has been delete');
            } else {
                $request->session()->flash('error', 'error flash message!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return \redirect()->route('admin.users.index');
    }

    public function updateusers(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Gate::denies('for-superadmin-admin')) {
                return back();
            }
            $username = [];
            $users = User::all();
            foreach ($users as $value) {
                \array_push($username, $value->username);
            }
            $results = Http::retry(2, 100)->get(ENV('USERS_UPDATE'), ['usernames' => $username])->json();

            if (count($results) <= 0) {
                $request->session()->flash('success', 'has been update user');
                return back();
            }

            $role = Role::where('name', 'user')->first();
            foreach ($results as $key => $value) {
                $user = $this->userService->create([
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
            
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return back();
    }
}
