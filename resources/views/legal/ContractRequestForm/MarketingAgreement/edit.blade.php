@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/marketingagreement.css')}}">
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
            <div>Advertisement and Marketing Agreement
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

            <form class="needs-validation" novalidate
                action="{{route('legal.contract-request.marketingagreement.store')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <span class="badge badge-primary">CONTRACT REQUEST FORM</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationAcction"><strong>Action</strong> <span
                                style="color: red;">*</span></label>
                        <select name="action_id" id="validationAcction" class="form-control" required>
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
                        <select name="agreement_id" id="validationAgreements" class="form-control" required>
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
                            placeholder="abcdefg" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyCertificate"><strong>Company Certificate</strong> </label>
                        <input type="file" class="form-control" id="validationCompanyCertificate" name="company_cer"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresentative"><strong>Legal Representative</strong> </label>
                        <input type="text" class="form-control" id="validationRepresentative" name="representative"
                            value="" placeholder="abcdefg" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresen"><strong>Representative Certificate</strong></label>
                        <input type="file" class="form-control" id="validationRepresen" name="representative_cer"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationAddress"><strong>Address</strong> </label>
                        <textarea class="form-control" name="address" id="validationAddress" rows="4"
                            required></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationSubTypeContract"><strong>Sub-type of contract</strong> <span
                                style="color: red;">*</span></label>
                        <select name="sub_type_contract" id="validationSubTypeContract" class="form-control" required>
                            <option value="">Shoose....</option>
                            <option value="1">Receiving the money</option>
                            <option value="2">Transfering the money</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <hr>
                <span class="badge badge-primary">Supporting Documents</span>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> </label>
                        <input type="file" class="form-control" id="validationPurchaseOrderFile" name="purchase_order"
                            value="" placeholder="abcdefg" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                        <input type="file" class="form-control" id="validationQuotationFile" name="quotation" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationPurpose"><strong>Purpose</strong></label>
                        <input type="text" class="form-control" id="validationPurpose" name="purpose" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationPromoteProduct"><strong>Promote a product</strong></label>
                        <input type="text" class="form-control" id="validationPromoteProduct" name="promote_a_product"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong></label>
                        <input type="text" class="form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                        <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDated"><strong>Dated</strong></label>
                        <input type="date" class="form-control" id="validationDated" name="dated" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDeliveryDate"><strong>Contract period</strong></label>
                        <input type="date" class="form-control" id="validationDeliveryDate" name="contract_period"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationUntill"><strong>Untill</strong></label>
                        <input type="date" class="form-control" id="validationUntill" name="untill" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr>

                <span class="badge badge-primary">Payment Terms</span>
                <div class="form-row">
                    <div class="col-md-9 mb-9">
                        {{-- <div class="col-md-3 mb-3"> --}}
                        <label for="validationMonthly"><strong>Monthly</strong></label>
                        <textarea class="form-control" name="payment_description" id="validationPaymentDescription"
                            rows="3" required></textarea>
                        {{-- <input type="text" class="form-control" id="validationMonthly" name="monthly" value="" required> --}}
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
                <hr>
                <button class="btn btn-success lg float-right" type="submit" style="margin-top: 5px">Create
                    Contract</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\marketingagreement.js')}}"></script>
@endsection