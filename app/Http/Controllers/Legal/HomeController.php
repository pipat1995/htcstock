<?php

namespace App\Http\Controllers\Legal;

use App\Enum\ContractEnum;
use App\Http\Controllers\Controller;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $contractRequestService;
    public function __construct(
        ContractRequestServiceInterface $contractRequestServiceInterface
    ) {
        $this->contractRequestService = $contractRequestServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $allPromised = $this->contractRequestService->totalpromised();
            $ownPromise = $this->contractRequestService->ownpromised(\auth()->user());
            $request = $this->contractRequestService->statusPromised(ContractEnum::R);
            $checking = $this->contractRequestService->statusPromised(ContractEnum::CK);
            $providing = $this->contractRequestService->statusPromised(ContractEnum::P);
            $complete = $this->contractRequestService->statusPromised(ContractEnum::CP);
        } catch (\Throwable $th) {
            throw $th;
        }
        $request = ($request / $allPromised) * 100;
        $checking = ($checking / $allPromised) * 100;
        $providing = ($providing / $allPromised) * 100;
        $complete = ($complete / $allPromised) * 100;
        // \dd($request);
        return \view('legal.home', \compact('allPromised', 'ownPromise', 'request', 'checking', 'providing', 'complete'));
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
}
