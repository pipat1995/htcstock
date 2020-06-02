<?php

namespace App\Http\Controllers;

use App\Accessories;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AccessoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // session()->set('success','Item created successfully.');
        return view('accessories');
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
    public function show(Accessories $accessories)
    {
        return $accessories;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessories $accessories)
    {
        return $accessories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessories $accessories)
    {
        \dd($request->all(),$accessories);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessories $accessories)
    {
        $accessories->destroy($accessories);
        return \redirect('accessories');
    }
}
