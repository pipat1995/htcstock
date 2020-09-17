<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\PermissionsRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $rolesRepository, $permissionsRepository;
    public function __construct(RoleRepositoryInterface $rolesRepositoryInterface,PermissionsRepositoryInterface $permissionsRepositoryInterface) {
        $this->rolesRepository = $rolesRepositoryInterface;
        $this->permissionsRepository = $permissionsRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $roles = $this->rolesRepository->all()->get();
            return \view('admin.roles.index')->with('roles',$roles);
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
        return \view('admin.roles.create')->with(['permissions' => $this->permissionsRepository->all()->get()]);
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
            $this->rolesRepository->create($request->except(['_token'])) ? $request->session()->flash('success','create permission success') : $request->session()->flash('error','create permission fail!');
            return \redirect()->route('admin.roles.index');
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
        return 'role show';
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
            $role = $this->rolesRepository->find($id);
            $permissions = $this->permissionsRepository->all()->get();
            return \view('admin.roles.edit')->with(['role'=>$role,'permissions' => $permissions]);
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
        $request->validate([
            'name' => 'required',
            'permission_name' => 'required|nullable',
        ]);
        try {
            $role = $this->rolesRepository->find($id);
            if ($this->rolesRepository->update([$request->name],$id)) {
                $role->permissions()->sync($request->permission_name);
                $request->session()->flash('success','update roles success');
            }else{
                $request->session()->flash('error','update roles fail!');
            }
            // $this->rolesRepository->update($request->except(['_token','_method']),$id) ? $request->session()->flash('success','update roles success') : $request->session()->flash('error','update roles fail!');
            return \redirect()->route('admin.roles.edit',$id);
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
        //
    }
}
