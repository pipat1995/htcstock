@extends('layouts.app')

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
                {{-- <a href="{{route('transactions.buy.create')}}" class="btn-shadow btn btn-info">
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
            <form class="needs-validation" novalidate action="{{route('transactions.buy.update',$transaction->id)}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationAccess_id" class="">อุปกรณ์</label>
                        <select name="access_id" id="validationAccess_id" class="form-control">
                            <option value="">--เลือก--</option>
                            @foreach ($accessories as $item)
                            <option value="{{$item->access_id}}"
                                {{$item->access_id == $transaction->access_id ? 'selected' : ''}}>{{$item->access_name}}
                            </option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationQty">จำนวน</label>
                        <input type="number" class="form-control" id="validationQty" name="qty"
                            value="{{$transaction->qty}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationIrnumber">IR No.</label>
                        <input type="text" class="form-control" id="validationIrnumber" name="ir_no"
                            value="{{$transaction->ir_no}}" placeholder="123456789">
                        <div class="invalid-feedback">
                            Please choose a IR No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationPonumber">PO No.</label>
                        <input type="text" class="form-control" id="validationPonumber" name="po_no"
                            value="{{$transaction->po_no}}" placeholder="12345678">
                        <div class="invalid-feedback">
                            Please provide a valid PO No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationinvoice">Ivoice No.</label>
                        <input type="text" class="form-control" id="validationinvoice" name="invoice_no"
                            value="{{$transaction->invoice_no}}" placeholder="12345678">
                        <div class="invalid-feedback">
                            Please provide a valid Ivoice No.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationVendor">Vendor</label>
                        <input type="text" class="form-control" id="validationVendor" name="vendor_id"
                            value="{{$transaction->vendor_id}}" placeholder="Vendor">
                        <div class="invalid-feedback">
                            Please provide a valid Vendor.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="trans_desc">Description</label>
                        <textarea name="trans_desc" id="trans_desc" class="form-control" rows="3">{{$transaction->trans_desc}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck" name="ref_no" value="ยกเลิก"
                            {{is_null($transaction->ref_no)?'':'checked'}}>
                        <label class="form-check-label" for="invalidCheck">
                            ยกเลิกการซื้อ
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" style="margin-top: 5px">Submit form</button>
            </form>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

            </script>
        </div>
    </div>
</div>
@stop