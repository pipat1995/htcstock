<?php

namespace App\Http\Controllers\Legal\ContractRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StoreWorkServiceContract;
use App\Services\Legal\Interfaces\ContractDescServiceInterface;
use App\Services\Legal\Interfaces\PaymentTypeServiceInterface;
use App\Services\Utils\FileService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class WorkServiceContractController extends Controller
{
    protected $contractDescService;
    protected $paymentTypeService;
    protected $fileService;
    public function __construct(ContractDescServiceInterface $contractDescServiceInterface, PaymentTypeServiceInterface $paymentTypeServiceInterface, FileService $fileService) {
        $this->contractDescService = $contractDescServiceInterface;
        $this->paymentTypeService = $paymentTypeServiceInterface;
        $this->fileService = $fileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('legal.ContractRequestForm.WorkServiceContract.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('legal.ContractRequestForm.WorkServiceContract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \redirect()->route('legal.contract-request.workservicecontract.index');
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
            $workservicecontract = $this->contractDescService->find($id);
            $paymentType = $this->paymentTypeService->dropdownPaymentType(1);
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('legal.ContractRequestForm.WorkServiceContract.edit')->with(['workservicecontract' => $workservicecontract,'paymentType' => $paymentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWorkServiceContract $request, $id)
    {
        $attributes = $request->except(['_token','_method']);
        $attributes['quotation'] = $this->fileService->convertPdfToText($attributes['quotation']);
        $attributes['coparation_sheet'] = $this->fileService->convertPdfToText($attributes['coparation_sheet']);
        $attributes['work_plan'] = $this->fileService->convertPdfToText($attributes['work_plan']);
        if (!empty($request->purchase_order)) {
            $attributes['purchase_order'] = $this->fileService->convertPdfToText($attributes['purchase_order']);
        }
        try {
            $this->contractDescService->update($attributes,$id);
        } catch (\Throwable $th) {
            throw $th;
        }
        \dd($attributes);
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

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $pdf = PDF::loadView('legal.ContractRequestForm.WorkServiceContract.pdf');
        return $pdf->stream();
        // return \view('legal.ContractRequestForm.WorkServiceContract.pdf');
    }
}
