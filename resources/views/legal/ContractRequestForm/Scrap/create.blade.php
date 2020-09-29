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
            <div>Scrap
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
            <span class="badge badge-primary">Supporting Documents</span>
            <form class="needs-validation" novalidate action="{{route('legal.contract-request.scrap.store')}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                        <input type="file" class="form-control" id="validationQuotationFile" name="quotation" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                        <input type="file" class="form-control" id="validationCoparationFile" name="coparation_sheet"
                            value="" placeholder="abcdefg" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationFactoryPermission"><strong>Factory Permission</strong> </label>
                        <input type="file" class="form-control" id="validationFactoryPermission"
                            name="factory_permission" value="" placeholder="abcdefg" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationWastePermission"><strong>Waste Permission</strong></label>
                        <input type="file" class="form-control" id="validationWastePermission" name="waste_permission"
                            value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>

                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationScope"><strong>Scope of Work</strong></label>
                        <input type="text" class="form-control" id="validationScope" name="scope_of_work" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationLocation"><strong>Location</strong></label>
                        <input type="text" class="form-control" id="validationLocation" name="location" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                        <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDated"><strong>Dated</strong></label>
                        <input type="date" class="form-control" id="validationDated" name="dated" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDeliveryDate"><strong>Delivery Date</strong></label>
                        <input type="date" class="form-control" id="validationDeliveryDate" name="delivery_date"
                            value="" required>
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
                            onchange="changeType(this)" required>
                            <option value="">Shoose....</option>
                            <option value="1">Scrap</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-8 mb-8 hide-contract" id="contractType1">
                        <ul>
                            <li class="li-none-type"><input type="number" value="100" class="type-contract-input"
                                    min="0"> <span>% of the total value of a contract from the date of delivered the
                                    scrap by HTC</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>

                {{-- <span class="badge badge-primary">Warranty</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationWarranty"><strong>Month</strong> <span
                                style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="validationWarranty" name="warranty" min="0"
                            step="1" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="validationNumberOfCycle"><strong>or number of cycle</strong> <span
                                style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="validationNumberOfCycle" name="number_of_cycle"
                            min="0" step="1" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
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
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\scrap.js')}}"></script>
@endsection