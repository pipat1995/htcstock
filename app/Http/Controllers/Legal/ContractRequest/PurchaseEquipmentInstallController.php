<?php

namespace App\Http\Controllers\Legal\ContractRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StorePurchaseEquipmentInstall;
use App\Services\Legal\Interfaces\ComercialListsServiceInterface;
use App\Services\Legal\Interfaces\ComercialTermServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\PaymentTypeServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseEquipmentInstallController extends Controller
{
    protected $contractDescService;
    protected $paymentTypeService;
    protected $fileService;
    protected $comercialListsService;
    protected $comercialTermService;
    public function __construct(
        ContractDescServiceInterface $contractDescServiceInterface,
        PaymentTypeServiceInterface $paymentTypeServiceInterface,
        FileService $fileService,
        ComercialListsServiceInterface $comercialListsServiceInterface,
        ComercialTermServiceInterface $comercialTermServiceInterface
    ) {
        $this->contractDescService = $contractDescServiceInterface;
        $this->paymentTypeService = $paymentTypeServiceInterface;
        $this->fileService = $fileService;
        $this->comercialListsService = $comercialListsServiceInterface;
        $this->comercialTermService = $comercialTermServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('legal.ContractRequestForm.PurchaseEquipmentInstall.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('legal.ContractRequestForm.PurchaseEquipmentInstall.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \redirect()->route('legal.contract-request.purchaseequipmentinstall.index');
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
            $purchaseequipmentinstall = $this->contractDescService->find($id);
            if ($purchaseequipmentinstall->purchase_order) {
                $purchaseequipmentinstall->purchase_order = $this->fileService->convertTextToPdf($purchaseequipmentinstall->purchase_order, 'purchase_order');
            }
            if ($purchaseequipmentinstall->quotation) {
                $purchaseequipmentinstall->quotation = $this->fileService->convertTextToPdf($purchaseequipmentinstall->quotation, 'quotation');
            }
            if ($purchaseequipmentinstall->coparation_sheet) {
                $purchaseequipmentinstall->coparation_sheet = $this->fileService->convertTextToPdf($purchaseequipmentinstall->coparation_sheet, 'coparation_sheet');
            }
            if ($purchaseequipmentinstall->boq) {
                $purchaseequipmentinstall->boq = $this->fileService->convertTextToPdf($purchaseequipmentinstall->boq, 'boq');
            }

            if ($purchaseequipmentinstall->value_of_contract) {
                $purchaseequipmentinstall->value_of_contract = explode(",", $purchaseequipmentinstall->value_of_contract);
            }
            $paymentType = $this->paymentTypeService->dropdownPaymentType($purchaseequipmentinstall->legalcontract->agreement_id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.PurchaseEquipmentInstall.edit')->with(['purchaseequipmentinstall' => $purchaseequipmentinstall, 'paymentType' => $paymentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePurchaseEquipmentInstall $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $attributes = [];
        $comercialAttr = [];

        $attributes['quotation'] = $this->fileService->convertPdfToText($data['quotation']);
        $attributes['coparation_sheet'] = $this->fileService->convertPdfToText($data['coparation_sheet']);
        $attributes['boq'] = $this->fileService->convertPdfToText($data['boq']);
        if (!empty($request->purchase_order)) {
            $attributes['purchase_order'] = $this->fileService->convertPdfToText($data['purchase_order']);
        }
        $attributes['payment_type_id'] = (int) $data['payment_type_id'];
        $attributes['value_of_contract'] = $data['value_of_contract'];
        $attributes['warranty'] = (int) $data['warranty'];
        // comercialTerm data
        $comercialAttr['scope_of_work'] = $data['scope_of_work'];
        $comercialAttr['location'] = $data['location'];
        $comercialAttr['purchase_order_no'] = $data['purchase_order_no'];
        $comercialAttr['quotation_no'] = $data['quotation_no'];
        $comercialAttr['dated'] = $data['dated'];
        $comercialAttr['delivery_date'] = $data['delivery_date'];

        DB::beginTransaction();
        try {
            if ($data['comercial_term_id']) {
                $this->comercialTermService->update($comercialAttr, $data['comercial_term_id']);
                $attributes['comercial_term_id'] = $data['comercial_term_id'];
            } else {
                $attributes['comercial_term_id'] = $this->comercialTermService->create($comercialAttr)->id;
            }
            $this->contractDescService->update($attributes, $id);
            $request->session()->flash('success',  ' has been create');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        // return \redirect()->route('legal.contract-request.workservicecontract.edit', $id);
        return \redirect()->route('legal.contract-request.index');
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
