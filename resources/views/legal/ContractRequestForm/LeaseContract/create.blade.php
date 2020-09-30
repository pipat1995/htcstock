@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/leasecontract.css')}}">
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
            <div>Lease Contract
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
            {{-- <h5 class="card-title">CONTRACT REQUEST FORM</h5> --}}

            <form class="needs-validation" novalidate action="{{route('legal.contract-request.leasecontract.store')}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationSubTypeContract"><strong>Sub-type of contract</strong> <span
                                style="color: red;">*</span></label>
                        <select name="sub_type_contract" id="validationSubTypeContract" class="form-control" >
                            <option value="">Shoose....</option>
                            <option value="1">Forklifts</option>
                            <option value="2">Traction Battery</option>
                            <option value="3">Accomodation</option>
                            <option value="4">Pallet</option>
                            <option value="5">Printer</option>
                            <option value="6">Others</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <hr>
                <span class="badge badge-primary">Supporting Documents</span>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> </label>
                        <input type="file" class="form-control" id="validationPurchaseOrderFile" name="purchase_order"
                            value="" placeholder="abcdefg" >
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                        <input type="file" class="form-control" id="validationQuotationFile" name="quotation" value=""
                            >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                        <input type="file" class="form-control" id="validationCoparationFile" name="coparation_sheet"
                            value="" placeholder="abcdefg" >
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                </div>

                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationScope"><strong>Scope of Work</strong></label>
                        <input type="text" class="form-control" id="validationScope" name="scope_of_work" value=""
                            >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationLocation"><strong>Location</strong></label>
                        <input type="text" class="form-control" id="validationLocation" name="location" value=""
                            >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong></label>
                        <input type="text" class="form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                            value="" >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                        <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no" value=""
                            >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDated"><strong>Dated</strong></label>
                        <input type="date" class="form-control" id="validationDated" name="dated" value="" >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDeliveryDate"><strong>Contract period</strong></label>
                        <input type="date" class="form-control" id="validationDeliveryDate" name="contract_period"
                            value="" >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationUntill"><strong>Untill</strong></label>
                        <input type="date" class="form-control" id="validationUntill" name="untill" value="" >
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
                                    <input type="text" class="form-control" id="validationDescription"
                                        name="description" min="0" step=0.01>
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
                                    <input type="number" class="form-control" id="validationAmount" name="amount"
                                        min="0" step=0.01>
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
                    <div class="col-md-3 mb-3">
                        <label for="validationContractType"><strong>Contract Type</strong> <span
                                style="color: red;">*</span></label>
                        <select name="contract_type" id="validationContractType" class="form-control"
                            onchange="changeType(this)" >
                            <option value="">Shoose....</option>
                            <option value="1">Monthly</option>
                            <option value="2">Other</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-9 mb-9 hide-contract" id="contractType1">
                        <div class="col-md-3 mb-3">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" value="" >
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mb-9 hide-contract" id="contractType2">
                        <ul>
                            <li class="li-none-type"><input type="number" class="type-contract-input" min="0"
                                    value="30"> <span>of the total value of a contract within 15 days from the date of
                                    signing of the contract</span>
                            </li>
                            <li class="li-none-type"><input type="number" class="type-contract-input" min="0"
                                    value="30"> <span>of the total value of a contract within 30 days from the date of
                                    delivered by Lessor and inspected by HTC </span></li>
                            <li class="li-none-type"><input type="number" class="type-contract-input" min="0"
                                    value="40"> <span>of the total value of a contract within 15 days from the date of
                                    contract lapse
                                </span></li>
                        </ul>
                    </div>
                </div>
                <hr>

                <span class="badge badge-primary">Warranty</span>
                <div class="form-row">
                    <div class="col-md-1 mb-3">
                        <label for="validationWarranty"><strong>Month</strong> <span
                                style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="validationWarranty" name="warranty" min="0"
                            step="1">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <button class="btn btn-success lg float-right" type="submit" style="margin-top: 5px">Create
                    Contract</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\leasecontract.js')}}"></script>
@endsection