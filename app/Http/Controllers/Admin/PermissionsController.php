<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsFormRequest;
use App\Repository\PermissionsRepositoryInterface;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    protected $permissionsRepository;
    public function __construct(PermissionsRepositoryInterface $permissionsRepositoryInterface) {
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
            $permissions = $this->permissionsRepository->all()->get();
            return \view('admin.permissions.index')->with('permissions',$permissions);
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
        return \view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionsFormRequest $request)
    {
        try {
            $this->permissionsRepository->create($request->except(['_token'])) ? $request->session()->flash('success','create permission success') : $request->session()->flash('error','create permission fail!');
            return \redirect()->route('admin.permissions.index');
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
        return 'permission show';
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
            return \view('admin.permissions.edit')->with('permission',$this->permissionsRepository->find($id));
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
    public function update(PermissionsFormRequest $request, $id)
    {
        try {
            $this->permissionsRepository->update($request->except(['_token']),$id) ? $request->session()->flash('success','update permission success') : $request->session()->flash('error','update permission fail!');
            return \redirect()->route('admin.permissions.edit',$id);
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
