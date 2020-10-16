<?php

namespace App\Http\Controllers\Legal\ContractRequest;

use App\Http\Controllers\Controller;
use App\Services\Legal\Interfaces\ComercialListsServiceInterface;
use App\Services\Legal\Interfaces\ComercialTermServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\PaymentTypeServiceInterface;
use App\Services\Legal\Interfaces\SubtypeContractServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;

class VendorServiceContractController extends Controller
{
    protected $contractDescService;
    protected $paymentTypeService;
    protected $fileService;
    protected $comercialListsService;
    protected $comercialTermService;
    protected $subtypeContractService;
    public function __construct(
        ContractDescServiceInterface $contractDescServiceInterface,
        PaymentTypeServiceInterface $paymentTypeServiceInterface,
        FileService $fileService,
        ComercialListsServiceInterface $comercialListsServiceInterface,
        ComercialTermServiceInterface $comercialTermServiceInterface,
        SubtypeContractServiceInterface $subtypeContractServiceInterface
    ) {
        $this->contractDescService = $contractDescServiceInterface;
        $this->paymentTypeService = $paymentTypeServiceInterface;
        $this->fileService = $fileService;
        $this->comercialListsService = $comercialListsServiceInterface;
        $this->comercialTermService = $comercialTermServiceInterface;
        $this->subtypeContractService = $subtypeContractServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('legal.ContractRequestForm.VendorServiceContract.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('legal.ContractRequestForm.VendorServiceContract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \redirect()->route('legal.contract-request.vendorservicecontract.index');
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
            $vendorservice = $this->contractDescService->find($id);
            // $slug = $this->subtypeContractService->find($vendorservice->legalcontract->agreement_id)->slug;
            if ($vendorservice->quotation) {
                $vendorservice->quotation = $this->fileService->convertTextToPdf($vendorservice->quotation, 'quotation');
            }
            if ($vendorservice->coparation_sheet) {
                $vendorservice->coparation_sheet = $this->fileService->convertTextToPdf($vendorservice->coparation_sheet, 'coparation_sheet');
            }
            if ($vendorservice->transportation_permission) {
                $vendorservice->transportation_permission = $this->fileService->convertTextToPdf($vendorservice->transportation_permission, 'transportation_permission');
            }
            if ($vendorservice->vehicle_registration_certificate) {
                $vendorservice->vehicle_registration_certificate = $this->fileService->convertTextToPdf($vendorservice->vehicle_registration_certificate, 'vehicle_registration_certificate');
            }
            if ($vendorservice->route) {
                $vendorservice->route = $this->fileService->convertTextToPdf($vendorservice->route, 'route');
            }
            if ($vendorservice->insurance) {
                $vendorservice->insurance = $this->fileService->convertTextToPdf($vendorservice->insurance, 'insurance');
            }
            if ($vendorservice->driver_license) {
                $vendorservice->driver_license = $this->fileService->convertTextToPdf($vendorservice->driver_license, 'driver_license');
            }
            if ($vendorservice->doctor_license) {
                $vendorservice->doctor_license = $this->fileService->convertTextToPdf($vendorservice->doctor_license, 'doctor_license');
            }
            if ($vendorservice->nurse_license) {
                $vendorservice->nurse_license = $this->fileService->convertTextToPdf($vendorservice->nurse_license, 'nurse_license');
            }
            if ($vendorservice->security_service_certification) {
                $vendorservice->security_service_certification = $this->fileService->convertTextToPdf($vendorservice->security_service_certification, 'security_service_certification');
            }
            if ($vendorservice->security_guard_license) {
                $vendorservice->security_guard_license = $this->fileService->convertTextToPdf($vendorservice->security_guard_license, 'security_guard_license');
            }
            
            
            

            $subtypeContract = $this->subtypeContractService->dropdownSubtypeContract($vendorservice->legalcontract->agreement_id);
            $paymentType = $this->paymentTypeService->dropdownPaymentType($vendorservice->legalcontract->agreement_id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.VendorServiceContract.edit')->with([
            'vendorservice' => $vendorservice,
            'paymentType' => $paymentType, 'subtypeContract' => $subtypeContract
        ]);
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
