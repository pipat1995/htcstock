<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StoreContractRequest;
use App\Models\Legal\LegalContract;
use App\Services\Legal\Interfaces\ActionServiceInterface;
use App\Services\Legal\Interfaces\AgreementServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use App\Services\Legal\Interfaces\PaymentTypeServiceInterface;
use App\Services\Legal\Interfaces\SubtypeContractServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContractRequestController extends Controller
{
    protected $actionService;
    protected $agreementService;
    protected $contractRequestService;
    protected $fileService;
    protected $contractDescService;
    protected $paymentTypeService;
    protected $subtypeContractService;
    public function __construct(
        ActionServiceInterface $actionServiceInterface,
        AgreementServiceInterface $agreementServiceInterface,
        ContractRequestServiceInterface $contractRequestServiceInterface,
        FileService $fileService,
        ContractDescServiceInterface $contractDescServiceInterface,
        PaymentTypeServiceInterface $paymentTypeServiceInterface,
        SubtypeContractServiceInterface $subtypeContractServiceInterface
    ) {
        $this->actionService = $actionServiceInterface;
        $this->agreementService = $agreementServiceInterface;
        $this->contractRequestService = $contractRequestServiceInterface;
        $this->fileService = $fileService;
        $this->contractDescService = $contractDescServiceInterface;
        $this->paymentTypeService = $paymentTypeServiceInterface;
        $this->subtypeContractService = $subtypeContractServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (Auth::user()->department->name === 'Legal') {
                $contracts = $this->contractRequestService->all();
            } else {
                $contracts = $this->contractRequestService->getByCreated();
            }

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
        try {
            $legalContract = $this->contractRequestService->find($id);
            $contractDest = $this->contractDescService->find($legalContract->legalContractDest->id);
            $agreements = $this->agreementService->dropdownAgreement();
            if ($contractDest->value_of_contract) {
                $contractDest->value_of_contract = explode(",", $contractDest->value_of_contract);
            }
            $paymentType = $this->paymentTypeService->dropdownPaymentType($legalContract->agreement_id);
        } catch (\Throwable $th) {
            throw $th;
        }
        switch ($legalContract->agreement_id) {
            case $agreements[0]->id:
                return \view('legal.ContractRequestForm.WorkServiceContract.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[1]->id:
                return \view('legal.ContractRequestForm.PurchaseEquipment.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[2]->id:
                return \view('legal.ContractRequestForm.PurchaseEquipmentInstall.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[3]->id:
                return \view('legal.ContractRequestForm.Mould.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[4]->id:
                return \view('legal.ContractRequestForm.Scrap.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[5]->id:
                $subtypeContract = $this->subtypeContractService->dropdownSubtypeContract($legalContract->agreement_id);
                return \view('legal.ContractRequestForm.VendorServiceContract.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest, 'subtypeContract' => $subtypeContract]);
                break;
            case $agreements[6]->id:
                return \view('legal.ContractRequestForm.LeaseContract.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[7]->id:
                return \view('legal.ContractRequestForm.ProjectBasedAgreement.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            case $agreements[8]->id:
                return \view('legal.ContractRequestForm.MarketingAgreement.view')->with(['legalContract' => $legalContract, 'paymentType' => $paymentType, 'contractDest' => $contractDest]);
                break;
            default:
                \abort(404);
                break;
        }
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
        $attributes = $request->except(['_token', '_method']);

        DB::beginTransaction();
        try {
            $contractRequest = $this->contractRequestService->find($id);
            $this->contractRequestService->update($attributes, $id);
            if ($contractRequest->company_cer !== $attributes['company_cer']) {
                Storage::delete($contractRequest->company_cer);
            }
            if ($contractRequest->representative_cer !== $attributes['representative_cer']) {
                Storage::delete($contractRequest->representative_cer);
            }
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

    /**
     * loadView by agreement pdf stream.
     * @param  LegalContract  $contractRequest
     * @return \Illuminate\Http\Response
     */
    public function loadViewContractByAgreement(LegalContract $contractRequest)
    {
        try {
            $agreements = $this->agreementService->dropdownAgreement();
        } catch (\Throwable $th) {
            throw $th;
        }

        switch ($contractRequest->agreement_id) {
            case $agreements[0]->id:
                return PDF::loadView('legal.ContractRequestForm.WorkServiceContract.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[1]->id:
                return PDF::loadView('legal.ContractRequestForm.PurchaseEquipment.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[2]->id:
                return PDF::loadView('legal.ContractRequestForm.PurchaseEquipmentInstall.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[3]->id:
                return PDF::loadView('legal.ContractRequestForm.Mould.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[4]->id:
                return PDF::loadView('legal.ContractRequestForm.Scrap.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[5]->id:
                return $this->pdfSubtypeContract($contractRequest);
                break;
            case $agreements[6]->id:
                return PDF::loadView('legal.ContractRequestForm.LeaseContract.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[7]->id:
                return PDF::loadView('legal.ContractRequestForm.ProjectBasedAgreement.pdf', ['contract' => $contractRequest]);
                break;
            case $agreements[8]->id:
                return PDF::loadView('legal.ContractRequestForm.MarketingAgreement.pdf', ['contract' => $contractRequest]);
                break;
            default:
                return \abort(404);
                break;
        }
    }

    /**
     * loadView by SubtypeContract pdf stream.
     * @param  LegalContract  $contractRequest
     * @return \Illuminate\Http\Response
     */
    public function pdfSubtypeContract(LegalContract $contractRequest)
    {
        switch ($contractRequest->legalContractDest->legalSubtypeContract->slug) {
            case 'bus-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-bus-contract', ['contract' => $contractRequest]);
                break;
            case 'cleaning-contract':
                // \dd();
                $attribs = $contractRequest->legalContractDest->legalComercialTerm->attributesToArray();
                $total = array_reduce(array_keys($attribs), function ($accumulator, $key) use ($attribs) {
                    if (
                        $key === 'road' || $key === 'building' || $key === 'toilet' || $key === 'canteen'
                        || $key === 'washing' || $key === 'water' || $key === 'mowing' || $key === 'general'
                    ) {
                        return $accumulator += $attribs[$key];
                    }
                    return $accumulator;
                }, 0);
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-cleaning-contract', ['contract' => $contractRequest, 'total' => $total]);
                break;
            case 'cook-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-cook-contract', ['contract' => $contractRequest]);
                break;
            case 'doctor-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-doctor-contract', ['contract' => $contractRequest]);
                break;
            case 'nurse-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-nurse-contract', ['contract' => $contractRequest]);
                break;
            case 'security-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-security-contract', ['contract' => $contractRequest]);
                break;
            case 'subcontractor-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-subcontractor-contract', ['contract' => $contractRequest]);
                break;
            case 'transportation-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-transportation-contract', ['contract' => $contractRequest]);
                break;
            case 'it-contract':
                return PDF::loadView('legal.ContractRequestForm.VendorServiceContract.pdf-it-contract', ['contract' => $contractRequest]);
                break;
            default:
                return \abort(404);
                break;
        }
    }


    public function uploadFile(Request $request)
    {
        // max 20 MB.
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:20480',
        ]);

        if ($validator->fails()) {
            return \response()->json($validator->messages(), 400);
        }
        $segments = explode('/', \substr(url()->previous(), strlen($request->root())));
        $path = Storage::disk('public')->put(
            $segments[1] . '/' . $segments[2],
            $request->file('file'),
        );
        return \response()->json(['path' => $path]);
    }


    /**
     * Create pdf stream.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        try {
            $contract = $this->contractRequestService->find($id);
            // \dd($contract->legalContractDest);
            if ($contract->legalContractDest->value_of_contract) {
                $contract->legalContractDest->value_of_contract = explode(",", $contract->legalContractDest->value_of_contract);
            }
            $pdf = $this->loadViewContractByAgreement($contract);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $pdf->stream();
    }
}
