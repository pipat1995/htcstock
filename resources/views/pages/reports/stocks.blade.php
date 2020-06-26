@extends('layouts.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>รายการคลัง
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
                {{-- <a href="#" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    ค้นหา</a> --}}
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('reports.stocks.list')}}" method="GET">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationAccess_id" class="">อุปกรณ์</label>
                        <select name="access_id" id="validationAccess_id" class="form-control">
                            <option value="">--เลือก--</option>
                            @foreach ($accessories as $item)
                            <option value="{{$item->access_id}}" {{$formSearch->access_id == $item->access_id ? 'selected' : ''}}>
                                {{$item->access_name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    {{-- <div class="col-md-3 mb-3">
                        <label for="validationCreated_at">วันที่</label>
                        <input type="date" class="form-control" id="validationSCreated_at" name="s_created_at" value="{{$formSearch->s_created_at}}"
                            oninput="changeValue(this)">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCreated_at">ถึง วันที่</label>
                        <input type="date" class="form-control" id="validationECreated_at" name="e_created_at" value="{{$formSearch->e_created_at}}"
                            readonly>
                    </div> --}}
                    <div class="col-md-2 mb-2">
                        <button class="btn-shadow btn btn-info" type="submit" style="margin-top: 30px">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            ค้นหา</button>
                    </div>
                </div>
            </form>
            <script>
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        if (document.getElementById("validationSCreated_at").value) {
                            document.getElementById("validationECreated_at").readOnly = false;
                        }
                        
                    }, false);
                })();
                function changeValue(e){
                    if (e.value) {
                        document.getElementById("validationECreated_at").readOnly = false;
                    } else{
                        document.getElementById("validationECreated_at").readOnly = true;
                    }
                }
            </script>
        </div>
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
                            <th>จำนวน</th>
                            {{-- <th>วันที่</th>
                            <th>สร้างโดย</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->accessorie->access_name}}</td>
                            <td>{{$item->quantity}}</td>
                            {{-- <td>{{$item->created_at}}</td>
                            <td>{{$item->transactionCreated->name}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@stop