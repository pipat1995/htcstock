<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StoreContractRequest;
use App\Models\Legal\LegalContract;
use App\Services\Legal\Interfaces\ActionServiceInterface;
use App\Services\Legal\Interfaces\AgreementServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $contracts = $this->contractRequestService->all();
            return \view('legal.ContractRequestForm.index')->with(['contracts' => $contracts]);
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
        return \view('legal.ContractRequestForm.create')->with(['actions' => $actions, 'agreements' => $agreements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractRequest $request)
    {
        $attributes = $request->except(['_token']);
        $attributes['company_cer'] = $this->fileService->convertPdfToText($attributes['company_cer']);
        $attributes['representative_cer'] = $this->fileService->convertPdfToText($attributes['representative_cer']);
        $attributes['created_by'] = Auth::user()->id;
        DB::beginTransaction();
        try {
            $body = $this->contractDescService->create([]);
            if ($body) {
                $attributes['contract_dest_id'] = $body->id;
            }
            $contractRequest = $this->contractRequestService->create($attributes);

            if (!$contractRequest) {
                $request->session()->flash('error', 'error create!');
            } else {
                $request->session()->flash('success',  ' has been create');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return $this->redirectContractByAgreement($contractRequest);
        
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
        try {
            $contract = $this->contractRequestService->find($id);
            $contract->company_cer = $this->fileService->convertTextToPdf($contract->company_cer, 'company_cer');
            $contract->representative_cer = $this->fileService->convertTextToPdf($contract->representative_cer, 'representative_cer');
            $actions = $this->actionService->dropdownAction();
            $agreements = $this->agreementService->dropdownAgreement();
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.edit')->with(['contract' => $contract, 'actions' => $actions, 'agreements' => $agreements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContractRequest $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $attributes = [];
        if ($request->file('company_cer')->getSize() > 0) {
            $attributes['company_cer'] = $this->fileService->convertPdfToText($data['company_cer']);
        }
        if ($request->file('representative_cer')->getSize() > 0) {
            $attributes['representative_cer'] = $this->fileService->convertPdfToText($data['representative_cer']);
        }
        $attributes['action_id'] = $data['action_id'];
        $attributes['agreement_id'] = $data['agreement_id'];
        $attributes['company_name'] = $data['company_name'];
        $attributes['representative'] = $data['representative'];
        $attributes['address'] = $data['address'];
        DB::beginTransaction();
        try {
            $this->contractRequestService->update($attributes, $id);
            $contractRequest = $this->contractRequestService->find($id);
            // \dd($attributes,$contractRequest);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return $this->redirectContractByAgreement($contractRequest);
        
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

    public function redirectContractByAgreement(LegalContract $contractRequest)
    {
        try {
            $agreements = $this->agreementService->dropdownAgreement();
        } catch (\Throwable $th) {
            throw $th;
        }

        switch ($contractRequest->agreement_id) {
            case $agreements[0]->id:
                return \redirect()->route('legal.contract-request.workservicecontract.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[1]->id:
                return \redirect()->route('legal.contract-request.purchaseequipment.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[2]->id:
                return \redirect()->route('legal.contract-request.purchaseequipmentinstall.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[3]->id:
                return \redirect()->route('legal.contract-request.mould.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[4]->id:
                return \redirect()->route('legal.contract-request.scrap.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[5]->id:
                return \redirect()->route('legal.contract-request.vendorservicecontract.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[6]->id:
                return \redirect()->route('legal.contract-request.leasecontract.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[7]->id:
                return \redirect()->route('legal.contract-request.projectbasedagreement.edit', $contractRequest->contract_dest_id);
                break;
            case $agreements[8]->id:
                return \redirect()->route('legal.contract-request.marketingagreement.edit', $contractRequest->contract_dest_id);
                break;
            default:
                return \abort(404);
                break;
        }
    }
}
