<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StoreContractRequest;
use App\Services\Legal\Interfaces\ActionServiceInterface;
use App\Services\Legal\Interfaces\AgreementServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractRequestController extends Controller
{
    protected $actionService;
    protected $agreementService;
    protected $contractRequestService;
    protected $fileService;
    protected $contractDescService;
    public function __construct(ActionServiceInterface $actionServiceInterface, AgreementServiceInterface $agreementServiceInterface, ContractRequestServiceInterface $contractRequestServiceInterface, FileService $fileService, ContractDescServiceInterface $contractDescServiceInterface)
    {
        $this->actionService = $actionServiceInterface;
        $this->agreementService = $agreementServiceInterface;
        $this->contractRequestService = $contractRequestServiceInterface;
        $this->fileService = $fileService;
        $this->contractDescService = $contractDescServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            return \view('legal.ContractRequestForm.index');
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
        try {
            $actions = $this->actionService->dropdownAction();
            $agreements = $this->agreementService->dropdownAgreement();
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.create')->with(['actions' => $actions, 'agreements' => $agreements]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractRequest $request)
    {
        try {
            $agreements = $this->agreementService->dropdownAgreement();
            $attributes = $request->except(['_token']);
            $attributes['company_cer'] = $this->fileService->convertPdfToText($attributes['company_cer']);
            $attributes['representative_cer'] = $this->fileService->convertPdfToText($attributes['representative_cer']);
            $attributes['created_by'] = Auth::user()->id;

            $body = $this->contractDescService->create([]);
            if ($body) {
                $attributes['contract_dest_id'] = $body->id;
            }

            $contractRequest = $this->contractRequestService->create($attributes);

            if (!$contractRequest) {
                $request->session()->flash('error', 'error create!');
            }else {
                $request->session()->flash('success',  ' has been create');
            }

            switch ($request->agreement_id) {
                case $agreements[0]->id:
                    return \redirect()->route('legal.contract-request.workservicecontract.edit',$contractRequest->contract_dest_id);
                    break;
                case $agreements[1]->id:
                    return \redirect()->route('legal.contract-request.purchaseequipment.create');
                    break;
                case $agreements[2]->id:
                    return \redirect()->route('legal.contract-request.purchaseequipmentinstall.create');
                    break;
                case $agreements[3]->id:
                    return \redirect()->route('legal.contract-request.mould.create');
                    break;
                case $agreements[4]->id:
                    return \redirect()->route('legal.contract-request.scrap.create');
                    break;
                case $agreements[5]->id:
                    return \redirect()->route('legal.contract-request.vendorservicecontract.create');
                    break;
                case $agreements[6]->id:
                    return \redirect()->route('legal.contract-request.leasecontract.create');
                    break;
                case $agreements[7]->id:
                    return \redirect()->route('legal.contract-request.projectbasedagreement.create');
                    break;
                case $agreements[8]->id:
                    return \redirect()->route('legal.contract-request.marketingagreement.create');
                    break;
                default:
                    return \abort(404);
                    break;
            }
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
