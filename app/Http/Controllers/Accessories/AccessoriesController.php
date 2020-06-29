<?php

namespace App\Http\Controllers\Accessories;

use App\Http\Controllers\Controller;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    protected $accessoriesRepository;
    protected $transactionsRepository;
    public function __construct(AccessoriesRepositoryInterface $accessoriesRepositoryInterface, TransactionsRepositoryInterface $transactionsRepositoryInterface)
    {
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->transactionsRepository = $transactionsRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
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

    public function checkStock(String $id)
    {
        try {
            $result = $this->transactionsRepository->howMuchAccessorie($id);
            if (is_null($result)) {
                return response()->json(['message' => "No data transactions"], 200);
            }
            return response()->json(['name' => $result->accessorie->access_name, 'qty' => (int) $result->quantity], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function accessoriesAvailable()
    {
        try {
            // \dd($this->transactionsRepository->getAccessoriesAvailable());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
