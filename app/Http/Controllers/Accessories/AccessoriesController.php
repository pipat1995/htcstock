<?php

namespace App\Http\Controllers\Accessories;

use App\Accessories;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    private $accessoriesRepository;

    public function __construct(AccessoriesRepositoryInterface $accessoriesRepository)
    {
        $this->accessoriesRepository = $accessoriesRepository;
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
            $accessories = $this->accessoriesRepository->all();
            return view('accessories.accessories', \compact('accessories'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
                'name' => 'required|max:255',
                'unit' => 'required',
            ]);
            $accessories = $this->accessoriesRepository->store($request);
            if (!$accessories->exists) {

            }
            return \redirect()->route('accessories.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accessories = $this->accessoriesRepository->edit($id);
        return $accessories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $accessories = $this->accessoriesRepository->update($request, $id);
            return \redirect()->route('accessories.index');;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $accessories = $this->accessoriesRepository->delete($id);
            return \redirect()->route('accessories.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
