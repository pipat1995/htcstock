<?php

namespace App\Http\Controllers\Legal;

use App\Enum\ContractEnum;
use App\Http\Controllers\Controller;
use App\Services\IT\Interfaces\UserServiceInterface;
use App\Services\Legal\Interfaces\AgreementServiceInterface;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    protected $contractRequestService;
    protected $userService;
    protected $agreementService;
    public function __construct(
        ContractRequestServiceInterface $contractRequestServiceInterface,
        UserServiceInterface $userServiceInterface,
        AgreementServiceInterface $agreementServiceInterface
    ) {
        $this->contractRequestService = $contractRequestServiceInterface;
        $this->userService = $userServiceInterface;
        $this->agreementService = $agreementServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedStatus = collect($request->status);
        $selectedAgree = collect($request->agreement);
        $status = [ContractEnum::R, ContractEnum::CK, ContractEnum::P, ContractEnum::CP];
        // $query = $request->all();
        try {
            // if (Gate::allows('for-adminlegal') || Gate::allows('for-superadmin')) {
                
            // } else {
            //     $contracts = null;
            // }
            $contracts = $this->contractRequestService->filterForAdmin($request);
            $agreements = $this->agreementService->dropdownAgreement();
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
        return \view('legal.home', \compact('allPromised', 'ownPromise', 'request', 'checking', 'providing', 
        'complete', 'contracts', 'status', 'selectedStatus', 'selectedAgree','agreements'));
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
