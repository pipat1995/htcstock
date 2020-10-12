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
                        <select name="action_id" id="validationAcction" class="form-control" required>
                            <option value="">Shoose....</option>
                            @isset($actions)
                            @foreach ($actions as $action)
                            <option value="{{$action->id}}">{{$action->name}}</option>
                            @endforeach
                            @endisset
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
                            @isset($agreements)
                            @foreach ($agreements as $agreement)
                            <option value="{{$agreement->id}}">{{$agreement->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyName"><strong>Full name (Company’s, Person’s)</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationCompanyName" name="company_name" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyCertificate"><strong>Company Certificate</strong> <span
                            style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationCompanyCertificate" name="company_cer"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresentative"><strong>Legal Representative</strong> <span
                            style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="validationRepresentative" name="representative"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresen"><strong>Representative Certificate</strong> <span
                            style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="validationRepresen" name="representative_cer"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationAddress"><strong>Address</strong> <span
                            style="color: red;">*</span></label>
                        <textarea class="form-control" name="address" id="validationAddress" rows="4"
                            required></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\create.js')}}"></script>
@endsection