@extends('layouts.app')
@section('sidebar')
@include('includes.it_sidebar');
@stop
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>การซื้อ
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
                {{-- <a href="{{route('it.buy.create')}}" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-business-time fa-w-20"></i>
                </span>
                ซื้อ</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">แบบฟอร์มการซื้อ</h5>
            <form class="needs-validation" novalidate action="{{route('it.buy.store')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationAccess_id" class="">อุปกรณ์</label>
                        <select name="access_id" id="validationAccess_id" class="form-control"
                            onchange="checkQtyAccess(this)" required>
                            <option value="">--เลือก--</option>
                            @foreach ($accessories as $item)
                            <option value="{{$item->access_id}}">{{$item->access_name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationQty">จำนวน </label>
                        <input type="number" class="form-control" id="validationQty" name="qty" value="" min="1"
                            oninput="quantity(this)" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationUnitCost">UnitCost</label>
                        <input type="number" class="form-control" id="validationUnitCost" name="unit_cost" value=""
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid UnitCost.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationPonumber">PO No.</label>
                        <input type="text" class="form-control" id="validationPonumber" name="po_no" value=""
                            placeholder="12345678" required>
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationinvoice">Ivoice No.</label>
                        <input type="text" class="form-control" id="validationinvoice" name="invoice_no" value=""
                            placeholder="12345678" required>
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationVendor">Vendor</label>
                        <input type="text" class="form-control" id="validationVendor" name="vendor_id" value=""
                            placeholder="Vendor" required>
                        <div class="invalid-feedback">
                            Please provide a valid Vendor.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationIrnumber">IR No.</label>
                        <input type="text" class="form-control" id="validationIrnumber" name="ir_no" value=""
                            placeholder="123456789" required>
                        <div class="invalid-feedback">
                            Please choose a IR No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationIrDate">IR Date.</label>
                        <input type="date" class="form-control" id="validationIrDate" name="ir_date" value="" required>
                        <div class="invalid-feedback">
                            Please choose a IR Date.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="trans_desc">Description</label>
                        <textarea name="trans_desc" id="trans_desc" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" style="margin-top: 5px" disabled>Submit form</button>
            </form>
            <script src="{{asset('assets\js\transactions\buy.js')}}" defer></script>

        </div>
    </div>
</div>
@stop