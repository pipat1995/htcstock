@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/legals/purchaseequipment_install.css')}}">
@endsection
@section('sidebar')
@include('includes.sidebar.legal');
@stop
@section('content')
<!-- Back to top button -->
<a id="btnontop"></a>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Purchase Equipment and Installation <span class="badge badge-primary">{{$legalContract->status}}</span>
                <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a style="color: white" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark" href="{{route('legal.pdf',$legalContract->id)}}">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            </a>
            <div class="d-inline-block">
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                id="form-purchaseequipmentinstall">
                @csrf
                @method('PUT')
                {{-- head --}}
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationAcction"><strong>Action</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" value="{{$legalContract->LegalAction->name}}" readonly>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationAgreements"><strong>General Agreements</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" value="{{$legalContract->legalAgreement->name}}"
                            readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyName"><strong>Full name (Company’s, Person’s)</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" value="{{$legalContract->company_name}}" readonly>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCompanyCertificate"><strong>Company Certificate</strong> <span
                                style="color: red;">*</span></label>
                        <div>
                            <a href="{{url('storage/'.$legalContract->company_cer)}}" target="_blank"
                                rel="noopener noreferrer">{{$legalContract->company_cer ? 'view file' : ""}}</a>
                        </div>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresentative"><strong>Legal Representative</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" value="{{$legalContract->representative}}" readonly>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationRepresen"><strong>Representative Certificate</strong> <span
                                style="color: red;">*</span> </label>
                        <div>
                            <a href="{{url('storage/'.$legalContract->representative_cer)}}" target="_blank"
                                rel="noopener noreferrer">{{$legalContract->representative_cer ? 'view file' : ""}}</a>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationAddress"><strong>Address</strong> <span
                                style="color: red;">*</span></label>
                        <textarea class="form-control-sm form-control" rows="4" readonly>{{$legalContract->address}}</textarea>
                    </div>
                </div>
                {{-- end head --}}
                <hr>
                <span class="badge badge-primary">Supporting Documents</span>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationPurchaseOrderFile"><strong>Purchase Order</strong> </label>
                        <div>
                            <a href="{{url('storage/'.$contractDest->purchase_order)}}" target="_blank"
                                rel="noopener noreferrer">{{$contractDest->purchase_order ? 'view file' : ""}}</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationQuotationFile"><strong>Quotation</strong> <span
                                style="color: red;">*</span> </label>
                        <div>
                            <a href="{{url('storage/'.$contractDest->quotation)}}" target="_blank"
                                rel="noopener noreferrer">{{$contractDest->quotation ? 'view file' : ""}}</a>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCoparationFile"><strong>AEC/Coparation Sheet</strong> <span
                                style="color: red;">*</span> </label>
                        <div>
                            <a href="{{url('storage/'.$contractDest->coparation_sheet)}}" target="_blank"
                                rel="noopener noreferrer">{{$contractDest->coparation_sheet ? 'view file' : ""}}</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationBOQFile"><strong>BOQ</strong> <span style="color: red;">*</span> </label>
                        <div>
                            <a href="{{url('storage/'.$contractDest->boq)}}" target="_blank"
                                rel="noopener noreferrer">{{$contractDest->boq ? 'view file' : ""}}</a>
                        </div>
                    </div>
                </div>

                <hr>

                <span class="badge badge-primary">Comercial Terms</span>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationScope"><strong>Scope of Work</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" id="validationScope" name="scope_of_work"
                            value="{{isset($contractDest->legalComercialTerm) ? $contractDest->legalComercialTerm->scope_of_work : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationLocation"><strong>Location</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" id="validationLocation" name="location"
                            value="{{isset($contractDest->legalComercialTerm) ? $contractDest->legalComercialTerm->location : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationPurchaseOrderNo"><strong>Purchase Order No.</strong></label>
                        <input type="text" class="form-control-sm form-control" id="validationPurchaseOrderNo" name="purchase_order_no"
                            value="{{isset($contractDest->legalComercialTerm) ? $contractDest->legalComercialTerm->purchase_order_no : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationQuotationNo"><strong>Quotation No</strong> <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control-sm form-control" id="validationQuotationNo" name="quotation_no"
                            value="{{isset($contractDest->legalComercialTerm) ? $contractDest->legalComercialTerm->quotation_no : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDated"><strong>Dated</strong> <span style="color: red;">*</span></label>
                        <input type="date" class="form-control-sm form-control" id="validationDated" name="dated"
                            value="{{isset($contractDest->legalComercialTerm->dated) ? $contractDest->legalComercialTerm->dated->format('Y-m-d') : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationDeliveryDate"><strong>Delivery Date</strong> <span
                                style="color: red;">*</span></label>
                        <input type="date" class="form-control-sm form-control" id="validationDeliveryDate" name="delivery_date"
                            value="{{isset($contractDest->legalComercialTerm->delivery_date) ? $contractDest->legalComercialTerm->delivery_date->format('Y-m-d') : ""}}"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                </div>
                <hr>
                <span class="badge badge-primary">Purchase list</span>
                @isset($contractDest->legalComercialList)
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
                            @foreach ($contractDest->legalComercialList as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->unit_price}}</td>
                                <td>{{$item->discount}}</td>
                                <td>{{$item->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3"></th>
                                <th>Total</th>
                                <th id="total">{{$contractDest->legalComercialList->reduce(function ($ac,$item) {
                                    return $ac+=$item->amount;
                                },0)}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @endisset
                <hr>

                <span class="badge badge-primary">Payment Terms</span>
                <input type="hidden" name="value_of_contract" value="">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationContractType"><strong>Contract Type</strong> <span
                                style="color: red;">*</span></label>
                        <select name="payment_type_id" id="validationContractType" class="form-control-sm form-control"
                            onchange="changeType(this)" readonly disabled>
                            <option value="">Shoose....</option>
                            @isset($paymentType)
                            @foreach ($paymentType as $item)
                            <option value="{{$item->id}}"
                                {{$contractDest->payment_type_id == $item->id ? "selected" : "" }}>
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
                                    value="{{isset($contractDest->value_of_contract)?$contractDest->value_of_contract[0]:30}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)"
                                    readonly>
                                <span>% of the total value of a contract within 15 days from the date of signing of the
                                    contract</span>
                            </li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($contractDest->value_of_contract)?$contractDest->value_of_contract[1]:60}}"
                                    class="type-contract-input" min="0" max="100" onchange="changeContractValue(this)"
                                    readonly>
                                <span>% of the total value of a contract within 30 days from the date of delivery,
                                    inspection and approval by HTC</span></li>
                            <li class="li-none-type"><input type="number"
                                    value="{{isset($contractDest->value_of_contract)?$contractDest->value_of_contract[2]:10}}"
                                    class="type-contract-input" min="0" max="100" readonly> <span>% of the total value
                                    of a contract within 60 days from the date of the Seller has receipt the 2nd
                                    installment as a performance bond
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
                        <input type="number" class="form-control-sm form-control" id="validationWarranty" name="warranty" min="0"
                            step="1" value="{{$contractDest->warranty}}" onchange="calMonthToYear(this)" readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationWarrantyForYear"><strong>Year</strong></label>
                        <input type="number" class="form-control-sm form-control" id="validationWarrantyForYear" min="0.1" step="0.1"
                            value="" readonly>
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">step approval</h5>
            <button class="accordion active">Approval Info</button>
            <div class="panel" style="max-height: 100%">
                <div class="table-responsive">
                    <table class="mb-0 table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Comment</th>
                                <th>Status change</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($approvalDetail)
                            @foreach ($approvalDetail as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->user->name}} {{$item->user->email}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->comment}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                            @endforeach
                            @endisset

                        </tbody>
                    </table>
                </div>
            </div>
            <form id="approval-contract-form" action="{{route('legal.contract.approval',$legalContract->id)}}"
                method="POST">
                @csrf
                @if ($permission === 'Write')
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationStatus"><strong>Status</strong></label>
                        <select name="status" id="status" class="form-control-sm form-control" style="cursor: pointer">
                            <option value="">Choouse...</option>
                            <option value="reject">Reject</option>
                            <option value="approval">Approval</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationComment"><strong>Comment</strong></label>
                        <textarea class="form-control-sm form-control" name="comment" rows="5"></textarea>
                    </div>
                </div>
                @endif
            </form>
            <hr>


            <a class="btn-shadow mr-3 btn btn-dark" type="button" href="{{url()->previous()}}">Back</a>
            <button class="mr-3 btn btn-success" type="submit" onclick="event.preventDefault();
            document.getElementById('approval-contract-form').submit();">Submit</button>
        </div>
    </div>
</div>
@stop

@section('second-script')
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\purchaseequipment_install.js')}}" defer></script>
<script src="{{asset('assets\js\legals\contractRequestForm\agreements\agreementall.js')}}" defer></script>
@endsection