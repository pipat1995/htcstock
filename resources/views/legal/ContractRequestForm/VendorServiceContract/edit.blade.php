@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/vendorservicecontract.css')}}">
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
            <div>Vendor Service Contract
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

            <span class="badge badge-primary">Sub-type Contract</span>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationSubType"><strong></strong> </label>
                    <select id="validationSubType" class="form-control" name="subtype" onchange="changeSubType(this)"
                        required>
                        <option data-id="">Shoose....</option>
                        <option value="1" data-id="bus-contract">Bus</option>
                        <option value="2" data-id="cleaning-contract">Cleaning</option>
                        <option value="3" data-id="cook-contract">Cook</option>
                        <option value="4" data-id="doctor-contract">Dortor</option>
                        <option value="5" data-id="nurse-contract">Nurse</option>
                        <option value="6" data-id="security-guard-contract">Security Guard</option>
                        <option value="7" data-id="sub-contract">SubContractor</option>
                        <option value="8" data-id="transportation-contract">Transportation</option>
                        <option value="9" data-id="">IT</option>
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <hr>

            <div class="show-contract sub-type" id="bus-contract">
                <span class="badge badge-primary">Supporting Documents bus</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationTransportationPermission"><strong>Transportation Permission</strong>
                            </label>
                            <input type="file" class="form-control" id="validationTransportationPermission"
                                name="transportation_permission" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationVehicleRegistration"><strong>Vehicle Registration
                                    Certificate</strong></label>
                            <input type="file" class="form-control" id="validationVehicleRegistration"
                                name="vehicle_registration_certificate" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationRoute"><strong>Route</strong></label>
                            <input type="file" class="form-control" id="validationRoute" name="route" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationInsurance"><strong>Insurance</strong></label>
                            <input type="file" class="form-control" id="validationInsurance" name="insurance" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationDriverLicense"><strong>Driver License</strong></label>
                            <input type="file" class="form-control" id="validationDriverLicense" name="driver_license"
                                required>
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
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationLocation"><strong>Location</strong></label>
                            <input type="text" class="form-control" id="validationLocation" name="location" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>
                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationRouteChange"><strong>Route Change</strong></label>
                            <input type="number" class="form-control" id="validationRouteChange" name="route_change"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationOT"><strong>OT</strong></label>
                            <input type="number" class="form-control" id="validationOT" name="ot" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationHolidayPay"><strong>Holiday Pay</strong></label>
                            <input type="number" class="form-control" id="validationHolidayPay" name="holiday_pay"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationOTDriver"><strong>OT driver</strong></label>
                            <input type="number" class="form-control" id="validationOTDriver" name="ot_driver" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="cleaning-contract">
                <span class="badge badge-primary">Supporting Documents cleaning</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    {{-- <span class="badge badge-primary">Number of maid</span> --}}
                    <div class="form-row">
                        <div class="col-md-4 mb-4"></div>
                        <div class="col-md-4 mb-4" style="text-align: center"><label
                                for="Numberofmaid"><u><strong>Number of maid</strong></u></label></div>
                        <div class="col-md-4 mb-4"></div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationRoad"><strong>Road</strong></label>
                            <input type="number" class="form-control" id="validationRoad" name="road" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationBuilding"><strong>Building</strong></label>
                            <input type="number" class="form-control" id="validationBuilding" name="building" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationToilet"><strong>Toilet</strong></label>
                            <input type="number" class="form-control" id="validationToilet" name="toilet" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCanteen"><strong>Canteen</strong></label>
                            <input type="number" class="form-control" id="validationCanteen" name="canteen" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationWashing"><strong>Washing</strong></label>
                            <input type="number" class="form-control" id="validationWashing" name="washing" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWater"><strong>Water</strong></label>
                            <input type="number" class="form-control" id="validationWater" name="water" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationMowing"><strong>Mowing</strong></label>
                            <input type="number" class="form-control" id="validationMowing" name="mowing" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationGeneral"><strong>General</strong></label>
                            <input type="number" class="form-control" id="validationGeneral" name="general" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="Total"><strong>Total</strong></label>
                            <input type="number" class="form-control" value="" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>

                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationOT"><strong>OT</strong></label>
                            <input type="number" class="form-control" id="validationOT" name="ot" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationHolidayPay"><strong>Holiday Pay</strong></label>
                            <input type="number" class="form-control" id="validationHolidayPay" name="holiday_pay"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="cook-contract">
                <span class="badge badge-primary">Supporting Documents cook</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfCook"><strong>Number of cook</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfCook" name="number_of_cook"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationOT"><strong>OT</strong></label>
                            <input type="number" class="form-control" id="validationOT" name="ot" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationOtherExpense"><strong>Other Expense</strong></label>
                            <input type="text" class="form-control" id="validationOtherExpense" name="other_expense"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="doctor-contract">
                <span class="badge badge-primary">Supporting Documents doctor</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationDoctorLicense"><strong>Doctor License</strong> </label>
                            <input type="file" class="form-control" id="validationDoctorLicense" name="doctor_license"
                                placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfDoctor"><strong>Number of doctor</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfDoctor"
                                name="number_of_doctor" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="nurse-contract">
                <span class="badge badge-primary">Supporting Documents nurse</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationNurseLicense"><strong>Nurse License</strong> </label>
                            <input type="file" class="form-control" id="validationNurseLicense" name="nurse_license"
                                placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfDoctor"><strong>Number of doctor</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfDoctor"
                                name="number_of_doctor" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="security-guard-contract">
                <span class="badge badge-primary">Supporting Documents security-guard</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationSecurityService"><strong>Security Service
                                    Certification</strong></label>
                            <input type="file" class="form-control" id="validationSecurityService"
                                name="security_service_certification" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationSecurityGuardLicense"><strong>Security Guard License</strong></label>
                            <input type="file" class="form-control" id="validationSecurityGuardLicense"
                                name="security_guard_license" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfSercurityGuard"><strong>Number of sercurity
                                    guard</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfSercurityGuard"
                                name="number_of_sercurity_guard" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="sub-contract">
                <span class="badge badge-primary">Supporting Documents sub</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfSubcontractor"><strong>Number of
                                    subcontractor</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfSubcontractor"
                                name="number_of_subcontractor" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationNumberOfAgent"><strong>Number of agent</strong></label>
                            <input type="number" class="form-control" id="validationNumberOfAgent"
                                name="number_of_agent" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationMonthly"><strong>Monthly</strong></label>
                            <input type="number" class="form-control" id="validationMonthly" name="monthly" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" style="margin-top: 5px">Next</button>
                </form>
            </div>

            <div class="hide-contract sub-type" id="transportation-contract">
                <span class="badge badge-primary">Supporting Documents transportation</span>
                <form class="needs-validation" novalidate
                    action="{{route('legal.contract-request.vendorservicecontract.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationFile"><strong>Quotation</strong> </label>
                            <input type="file" class="form-control" id="validationQuotationFile" name="quotation"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> </label>
                            <input type="file" class="form-control" id="validationCoparationFile"
                                name="coparation_sheet" placeholder="abcdefg" required>
                            <div class="invalid-feedback">
                                Please provide a valid PO No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Comercial Terms</span>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationScope"><strong>Scope of Work</strong></label>
                            <input type="text" class="form-control" id="validationScope" name="scope_of_work" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationQuotationNo"><strong>Quotation No</strong></label>
                            <input type="text" class="form-control" id="validationQuotationNo" name="quotation_no"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDated"><strong>Dated</strong></label>
                            <input type="date" class="form-control" id="validationDated" name="dated" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationContractPeriod"><strong>Contract period</strong></label>
                            <input type="date" class="form-control" id="validationContractPeriod" name="contract_period"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationUntill"><strong>Untill</strong></label>
                            <input type="date" class="form-control" id="validationUntill" name="untill" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationRoute"><strong>Route</strong></label>
                            <input type="text" class="form-control" id="validationRoute" name="route" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTo"><strong>To</strong></label>
                            <input type="text" class="form-control" id="validationTo" name="to" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDryContainerSize"><strong>Dry Container Size</strong></label>
                            <input type="number" class="form-control" id="validationDryContainerSize"
                                name="dry_container_size" step="0.01" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationThenumberoftruck"><strong>The number of truck</strong></label>
                            <input type="number" class="form-control" id="validationThenumberoftruck"
                                name="the_number_of_truck" required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingDay"><strong>Working Day</strong></label>
                            <input type="text" class="form-control" id="validationWorkingDay" name="working_day"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationWorkingTime"><strong>Working Time</strong></label>
                            <input type="text" class="form-control" id="validationWorkingTime" name="working_time"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Ivoice No.
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span class="badge badge-primary">Payment Terms</span>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationPriceOfService"><strong>Price of service</strong></label>
                            <input type="number" class="form-control" id="validationPriceOfService"
                                name="price_of_service" required>
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
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\vendorservicecontract.js')}}"></script>
@endsection