<?php

namespace App\Http\Controllers\Legal\ContractRequest;

use App\Http\Controllers\Controller;
use App\Services\Legal\Interfaces\ComercialListsServiceInterface;
use App\Services\Legal\Interfaces\ComercialTermServiceInterface;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\PaymentTypeServiceInterface;
use App\Services\Utils\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseEquipmentController extends Controller
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
        return \view('legal.ContractRequestForm.PurchaseEquipment.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('legal.ContractRequestForm.PurchaseEquipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \redirect()->route('legal.contract-request.purchaseequipment.index');
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
            $purchaseequipment = $this->contractDescService->find($id);
            if ($purchaseequipment->purchase_order) {
                $purchaseequipment->purchase_order = $this->fileService->convertTextToPdf($purchaseequipment->purchase_order, 'purchase_order');
            }
            if ($purchaseequipment->quotation) {
                $purchaseequipment->quotation = $this->fileService->convertTextToPdf($purchaseequipment->quotation, 'quotation');
            }
            if ($purchaseequipment->coparation_sheet) {
                $purchaseequipment->coparation_sheet = $this->fileService->convertTextToPdf($purchaseequipment->coparation_sheet, 'coparation_sheet');
            }

            if ($purchaseequipment->value_of_contract) {
                $purchaseequipment->value_of_contract = explode(",", $purchaseequipment->value_of_contract);
            }
            $paymentType = $this->paymentTypeService->dropdownPaymentType($purchaseequipment->legalcontract->agreement_id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.PurchaseEquipment.edit')->with(['purchaseequipment' => $purchaseequipment, 'paymentType' => $paymentType]);
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
        $data = $request->except(['_token', '_method']);
        $attributes = [];
        $comercialAttr = [];

        $attributes['quotation'] = $this->fileService->convertPdfToText($data['quotation']);
        $attributes['coparation_sheet'] = $this->fileService->convertPdfToText($data['coparation_sheet']);
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
