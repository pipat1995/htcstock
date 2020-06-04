<?php

namespace App\Http\Controllers;

use App\Accessories;
use App\Repositories\AccessoriesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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
    public function index(Request $request)
    {
        try {
            $accessories = $this->accessoriesRepository->all(); 
            return view('accessories',\compact('accessories'));
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
                'name' => 'required|max:255',
                'unit' => 'required',
            ]);
            $data = Accessories::firstOrNew(['name' => $request->name, 'unit' => $request->unit]);
            $data->save();
            if (!$data->exists) {
                $errors = new MessageBag();
                $errors->add('your_custom_error', 'Your custom error message!');
                // \dd($errors->isEmpty(),$errors->all());
                return \redirect('accessories')->withErrors($errors);
            }
            return \redirect('accessories')->with('create', 'Success!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function show($accessoriesID)
    {
        $accessories = $this->accessoriesRepository->findById($accessoriesID);
        return $accessories;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function edit($accessoriesID)
    {
        $accessories = $this->accessoriesRepository->findById($accessoriesID);
        return $accessories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accessoriesID)
    {
        try {
            $accessories = $this->accessoriesRepository->update($request,$accessoriesID);
            return \redirect('accessories');
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
    public function destroy($accessoriesID)
    {
        try {
            $accessories = $this->accessoriesRepository->delete($accessoriesID);
            return \redirect('accessories');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
