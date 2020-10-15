@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/workservicecontract.css')}}">
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
            <div>Hire of Work/Service Contract
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
            <form class="needs-validation" novalidate
                action="{{route('legal.contract-request.workservicecontract.update',$workservicecontract->id)}}"
                method="POST" enctype="multipart/form-data" id="form-workservicecontract">
                @csrf
                @method('PUT')
                {{-- Head --}}
                {{-- <span class="badge badge-primary">CONTRACT REQUEST FORM</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationAcction"><strong>Action</strong> <span
                                style="color: red;">*</span></label>
                        <select name="action_id" id="validationAcction" class="form-control" >
                            <option value="">Shoose....</option>
                            <option value="1">New contract</option>
                            <option value="2">Amend contract</option>
                            <option value="3">Renew contract</option>
                            <option value="4">Terminate contract</option>
                            <option value="5">Review contract</option>
                            <option value="6">Others</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationAgreements"><strong>General Agreements</strong> <span
                                style="color: red;">*</span></label>
                        <select name="agreement_id" id="validationAgreements" class="form-control" >
                            <option value="">Shoose....</option>
                            <option value="1">Hire of Work/Service Contract</option>
                            <option value="2">Purchase Equipment</option>
                            <option value="3">Purchase Equipment and Installation</option>
                            <option value="4">Mould</option>
                            <option value="5">Scrap</option>
                            <option value="6">Vendor Service Contract</option>
                            <option value="7">Lease Contract</option>
                            <option value="8">Project Based Agreement</option>
                            <option value="9">Advertisement and Marketing Agreement</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyName"><strong>Full name (Company’s, Person’s)</strong> </label>
                        <input type="text" class="form-control" id="validationCompanyName" name="company_name" value=""
                            required >
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyCertificate"><strong>Company Certificate</strong> </label>
                        <input type="file" class="form-control" id="validationCompanyCertificate" name="company_cer"
                            value="" >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresentative"><strong>Legal Representative</strong> </label>
                        <input type="text" class="form-control" id="validationRepresentative" name="representative"
                            value="" required >
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresen"><strong>Representative Certificate</strong></label>
                        <input type="file" class="form-control" id="validationRepresen" name="representative_cer"
                            value="" >
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationAddress"><strong>Address</strong> </label>
                        <textarea class="form-control" name="address" id="validationAddress" rows="4"
                            ></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr> --}}
                {{-- EndHead --}}
                <span class="badge badge-primary">Supporting Documents</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> </label>
                        <input type="file" class="form-control" id="validationPurchaseOrderFile" name="purchase_order"
                            data-cache="{{substr($workservicecontract->purchase_order,9)}}" value="">
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationQuotationFile"><strong>Quotation</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationQuotationFile"
                            data-cache="{{substr($workservicecontract->quotation,9)}}" name="quotation" value=""
                            required>

                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationCoparationFile" name="coparation_sheet"
                            data-cache="{{substr($workservicecontract->coparation_sheet,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationWorkPlan"><strong>Work Plan</strong> <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationWorkPlan" name="work_plan"
                            data-cache="{{substr($workservicecontract->work_plan,9)}}" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>

                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <input type="hidden" name="comercial_term_id" value="{{$workservicecontract->comercial_term_id}}">
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationScope"><strong>Scope of Work</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationScope" name="scope_of_work"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->scope_of_work : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationLocation"><strong>Location</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationLocation" name="location"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->location : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong> </label>
                        <input type="text" class="form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->purchase_order_no : ""}}">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationQuotationNo"><strong>Quotation No</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->quotation_no : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationDated"><strong>Dated</strong> <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationDated" name="dated"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->dated->format('Y-m-d') : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationContractPeriod"><strong>Contract period</strong> <span
                                style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->contract_period->format('Y-m-d') : ""}}"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationUntill"><strong>Untill</strong> <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationUntill" name="untill"
                            value="{{isset($workservicecontract->legalComercialTerm) ? $workservicecontract->legalComercialTerm->untill->format('Y-m-d') : ""}}"
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
                                    name="contract_dests_id" value="{{$workservicecontract->id}}">
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
                            <option value="{{$item->id}}"
                                {{$workservicecontract->payment_type_id == $item->id ? "selected" : "" }}>
                                {{$item->name}}
                            </option>
                            @endforeach
                            @endisset
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-8 mb-8 hide-contract" id="contractType1">
                        <ul>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[0]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of
                                    the total value of a contract within 15 days from the date of signing of the
                                    contract</span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[1]:40}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of
                                    the total value of a contract within 30 days from the date of accomplishment and
                                    approval by HTC </span></li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[2]:30}}"
                                    class="type-contract-input" min="0" max="100" readonly> <span>% of
                                    the total value of a contract within 30 days from the date of inspection and
                                    approval by HTC
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 mb-8 hide-contract" id="contractType2">

                        <ul>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[0]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of
                                    the total value of a contract within 15 days from the date of signing of the
                                    contract</span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[1]:60}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)">
                                <span>% of
                                    the total value of a contract within 30 days from the date of accomplishment and
                                    approval by HTC </span></li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($workservicecontract->value_of_contract)?$workservicecontract->value_of_contract[2]:10}}"
                                    class="type-contract-input" min="0" max="100" readonly> <span>% of
                                    the total value of a contract within 30 days from the date of inspection and
                                    approval by HTC
                                </span></li>
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
                            step="1" value="{{$workservicecontract->warranty}}" onchange="calMonthToYear(this)"
                            required>
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

                {{-- <span class="badge badge-primary">LOCATION INFORMATION</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationRequestor"><strong>Requestor</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationRequestor" name="requestor" min="0"
                            step="1" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationDate"><strong>Date</strong> <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="validationDate" name="date">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationDept"><strong>Dept</strong> <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationDept" name="dept" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationPhone"><strong>Phone/Ext</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationPhone" name="phone" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div> --}}
                <a class="btn btn-primary float-rigth" style="color: white !important; margin-top: 5px" type="button"
                    href="{{route('legal.contract-request.edit',$workservicecontract->legalcontract->id)}}">Back</a>
                <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\workservicecontract.js')}}"></script>
@endsection