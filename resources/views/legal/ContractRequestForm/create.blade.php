@extends('layouts.app')
@section('style')
<style>
    .show {
        display: block;
    }

    .hide {
        display: inline;
    }
</style>
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
            <div>CONTRACT REQUEST FORM
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
            <form class="needs-validation" novalidate action="{{route('legal.contract-request.store')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
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
                            placeholder="abcdefg" >
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
                            value="" placeholder="abcdefg" >
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
                {{-- <div role="content" id="agreement1" class="hide">
                    <h4 id="showAgreementText"></h4>
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationPO">Purchase Order<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationPO">Quotation<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationPO">AEC/Coparation Sheet<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationPO">Work Plan<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" >
                        </div>
                    </div>
                </div> --}}
                <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\create.js')}}"></script>
@endsection