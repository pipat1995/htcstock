<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('legal.ContractRequestForm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('legal.ContractRequestForm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->agreement_id) {
            case '1':
                return \redirect()->route('legal.contract-request.workservicecontract.create');
                break;
            case '2':
                return \redirect()->route('legal.contract-request.purchaseequipment.create');
                break;
            case '3':
                return \redirect()->route('legal.contract-request.purchaseequipmentinstall.create');
                break;
            case '4':
                return \redirect()->route('legal.contract-request.mould.create');
                break;
            case '5':
                return \redirect()->route('legal.contract-request.scrap.create');
                break;
            case '6':
                return \redirect()->route('legal.contract-request.vendorservicecontract.create');
                break;
            case '7':
                return \redirect()->route('legal.contract-request.leasecontract.create');
                break;
            case '8':
                return \redirect()->route('legal.contract-request.projectbasedagreement.create');
                break;
            case '9':
                return \redirect()->route('legal.contract-request.marketingagreement.create');
                break;
            default:
                return \abort(404);
                break;
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
