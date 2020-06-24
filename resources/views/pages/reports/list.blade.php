@extends('layouts.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>รายการอุปกรณ์
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
                <a href="#" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    ค้นหา</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <form action="{{route('reports.accessories.search')}}" method="get">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationAccess_id" class="">อุปกรณ์</label>
                    <select name="access_id" id="validationAccess_id" class="form-control" required>
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
                    <label for="validationQty">จำนวน</label>
                    <input type="number" class="form-control" id="validationQty" name="qty" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationIrnumber">IR No.</label>
                    <input type="text" class="form-control" id="validationIrnumber" name="ir_no" value=""
                        placeholder="123456789" required>
                    <div class="invalid-feedback">
                        Please choose a IR No.
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Table with hover</h5>
            <div class="table-responsive">
                <table class="mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>อุปกรณ์</th>
                            <th>จำนวณ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->accessorie->access_name}}</td>
                            <td>{{$item->qty}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop