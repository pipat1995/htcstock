@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/mould.css')}}">
@endsection
@section('sidebar')
@include('includes.legal_sidebar');
@stop
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Mould
                <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
            <div class="d-inline-block">
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            {{-- <form class="needs-validation" novalidate
                action="{{route('legal.contract-request.mould.update',$mould->id)}}" method="POST"
            enctype="multipart/form-data" id="form-mould">
            @csrf
            @method('PUT')
            <span class="badge badge-primary">Supporting Documents</span>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> </label>
                    <input type="file" class="form-control" id="validationPurchaseOrderFile" name="purchase_order"
                        value="" placeholder="abcdefg">
                    <div class="invalid-feedback">
                        Please provide a valid PO No.
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                    <input type="file" class="form-control" id="validationQuotationFile" name="quotation" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                    <input type="file" class="form-control" id="validationCoparationFile" name="coparation_sheet"
                        value="" placeholder="abcdefg">
                    <div class="invalid-feedback">
                        Please provide a valid PO No.
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="validationDrawing"><strong>Drawing</strong></label>
                    <input type="file" class="form-control" id="validationDrawing" name="drawing" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <label for="validationAddress"><strong>Address</strong> </label>
                    <textarea class="form-control" name="address" id="validationAddress" rows="4"></textarea>
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>

            <hr>

            <span class="badge badge-primary">Comercial Terms</span>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationScope"><strong>Scope of Work</strong></label>
                    <input type="text" class="form-control" id="validationScope" name="scope_of_work" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationLocation"><strong>Location</strong></label>
                    <input type="text" class="form-control" id="validationLocation" name="location" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong></label>
                    <input type="text" class="form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                        value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                    <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="validationDated"><strong>Dated</strong></label>
                    <input type="date" class="form-control" id="validationDated" name="dated" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="validationContractPeriod"><strong>Contract period</strong></label>
                    <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                        value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="validationUntill"><strong>Untill</strong></label>
                    <input type="date" class="form-control" id="validationUntill" name="untill" value="">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <table class="table table-bordered" id="table-comercial-lists">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" class="form-control" id="validationDescription" name="description"
                                    min="0" step=0.01>
                                <div class="invalid-feedback">
                                    Please provide a valid Ivoice No.
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="validationUnitPrice" name="unit_price"
                                    min="0" step=0.01>
                                <div class="invalid-feedback">
                                    Please provide a valid Ivoice No.
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="validationDiscount" name="discount"
                                    min="0" step=0.01>
                                <div class="invalid-feedback">
                                    Please provide a valid Ivoice No.
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="validationAmount" name="amount" min="0"
                                    step=0.01>
                                <div class="invalid-feedback">
                                    Please provide a valid Ivoice No.
                                </div>
                            </td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3"><button type="button" class="btn btn-warning"
                                    onclick="createRow()">Create</button></th>
                            <th>Total</th>
                            <th id="total"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <hr>

            <span class="badge badge-primary">Payment Terms</span>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationContractType"><strong>Contract Type</strong> <span
                            style="color: red;">*</span></label>
                    <select name="contract_type" id="validationContractType" class="form-control">
                        <option value="">Shoose....</option>
                        <option value="1">KBF</option>
                        <option value="2">MC&E</option>
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <hr>

            <span class="badge badge-primary">Warranty</span>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationWarranty"><strong>Month</strong> <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" id="validationWarranty" name="warranty" min="0" step="1">
                    <div class="invalid-feedback">
                        Please provide a valid Ivoice No.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
            </form> --}}
            <form class="needs-validation" novalidate
                action="{{route('legal.contract-request.mould.update',$mould->id)}}" method="POST"
                enctype="multipart/form-data" id="form-mould">
                @csrf
                @method('PUT')
                <span class="badge badge-primary">Supporting Documents</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationPurchaseOrderFile" name="purchase_order"
                            data-cache="{{substr($mould->purchase_order,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationQuotationFile"><strong>Quotation</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                            data-cache="{{substr($mould->quotation,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Quotation File.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationCoparationFile" name="coparation_sheet"
                            data-cache="{{substr($mould->coparation_sheet,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Coparation File.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationDrawingFile"><strong>Drawing</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationDrawingFile" name="drawing"
                            data-cache="{{substr($mould->coparation_sheet,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Drawing File.
                        </div>
                    </div>
                </div>

                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <input type="hidden" name="comercial_term_id" value="{{$mould->comercial_term_id}}">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationScope"><strong>Scope of Work</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationScope" name="scope_of_work"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->scope_of_work : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationToManufacture"><strong>To Manufacture</strong> </label>
                        <input type="text" class="form-control" id="validationToManufacture" name="to_manufacture"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->to_manufacture : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationOf"><strong>Of</strong></label>
                        <input type="text" class="form-control" id="validationOf" name="of"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->of : ""}}">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong></label>
                        <input type="text" class="form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->purchase_order_no : ""}}">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationQuotationNo"><strong>Quotation No</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->quotation_no : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDated"><strong>Dated</strong> <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationDated" name="dated"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->dated->format('Y-m-d') : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDeliveryDate"><strong>Delivery Date</strong> <span
                                style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationDeliveryDate" name="delivery_date"
                            value="{{isset($mould->legalComercialTerm) ? $mould->legalComercialTerm->delivery_date->format('Y-m-d') : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr>
                <span class="badge badge-primary">Purchase list</span>
                <div class="form-row">
                    <table class="table table-bordered" id="table-comercial-lists">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Amount</th>
                            </tr>
                            <tr>
                                <td> <button type="button" class="btn btn-warning" onclick="createRow()">Create</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="validationDescription"
                                        name="description" min="0" step=0.01>
                                </td>
                                <td>
                                    <input type="number" class="form-control" id="validationUnitPrice" name="unit_price"
                                        min="0" step=0.01>
                                </td>
                                <td>
                                    <input type="number" class="form-control" id="validationDiscount" name="discount"
                                        min="0" step=0.01>
                                </td>
                                <td>
                                    <input type="number" class="form-control" id="validationAmount" name="amount"
                                        min="0" step=0.01>
                                </td>
                                <input type="hidden" class="form-control" id="validationContractDestsId"
                                    name="contract_dests_id" value="{{$mould->id}}">
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3"></th>
                                <th>Total</th>
                                <th id="total"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <hr>

                <span class="badge badge-primary">Payment Terms</span>
                <input type="hidden" name="value_of_contract" value="">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationContractType"><strong>Contract Type</strong> <span
                                style="color: red;">*</span></label>
                        <select name="payment_type_id" id="validationContractType" class="form-control"
                            onchange="changeType(this)" required>
                            <option value="">Shoose....</option>
                            @isset($paymentType)
                            @foreach ($paymentType as $item)
                            <option value="{{$item->id}}" {{$mould->payment_type_id == $item->id ? "selected" : "" }}>
                                {{$item->name}}
                            </option>
                            @endforeach
                            @endisset
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-8 mb-8" id="contractType1">
                        <ul>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[0]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of the total value of a contract within 15 days from the date of signing of the
                                    contract</span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[1]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of the total value of a contract within 30 days from the date to be delivered of
                                    sample products.</span></li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[2]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of the total value of a contract within 60 days from the date to be delivered of
                                    mould.
                                </span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[3]:10}}"
                                    class="type-contract-input" min="0" max="100" readonly> <span>% of the total value
                                    of a contract within 30 days after 1-2 years of warranty lapse.
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 mb-8" id="contractType2">
                        <ul>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[0]:40}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of the total value of a contract within 15 days from the date of signing</span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[1]:50}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of the total value of a contract within 30 days from the date to be
                                    delivered</span></li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($mould->value_of_contract)?$mould->value_of_contract[3]:10}}"
                                    class="type-contract-input" min="0" max="100" readonly> <span>% of the total value
                                    of a contract within 30 days from the date to be delivered
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>

                <span class="badge badge-primary">Warranty</span>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationWarranty"><strong>Month</strong> <span
                                style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="validationWarranty" name="warranty" min="0"
                            step="1" value="{{$mould->warranty}}" onchange="calMonthToYear(this)" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationWarrantyForYear"><strong>Year</strong></label>
                        <input type="number" class="form-control" id="validationWarrantyForYear" min="0.1" step="0.1"
                            value="" readonly>
                    </div>
                </div>
                <hr>
                <a class="btn btn-primary float-rigth" style="color: white !important; margin-top: 5px" type="button"
                    href="{{route('legal.contract-request.edit',$mould->legalcontract->id)}}">Back</a>
                <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\mould.js')}}" defer></script>
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\agreementall.js')}}" defer></script>
@endsection