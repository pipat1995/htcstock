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
            <div>รายการยืม คืน
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
                <a href="{{route('it.lendings.create')}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    ยืม</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('it.lendings.index')}}" method="GET">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationAccess_id" class="">อุปกรณ์</label>
                        <select name="access_id" id="validationAccess_id" class="form-control select2">
                            <option value="">--เลือก--</option>
                            @foreach ($accessories as $item)
                            <option value="{{$item->access_id}}"
                                {{$formSearch->access_id == $item->access_id ? 'selected' : ''}}>
                                {{$item->access_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCreated_at">วันที่</label>
                        <input type="date" class="form-control" id="validationSCreated_at" name="s_created_at"
                            value="{{$formSearch->s_created_at}}" oninput="changeValue(this)">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCreated_at">ถึง วันที่</label>
                        <input type="date" class="form-control" id="validationECreated_at" name="e_created_at"
                            value="{{$formSearch->e_created_at}}" readonly>
                    </div>
                    <div class="col-md-2 mb-2">
                        <button class="btn-shadow btn btn-info" type="submit" style="margin-top: 30px">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            ค้นหา</button>
                    </div>
                </div>
            </form>
            <script src="{{asset('assets\js\transactions\lendings.js')}}" defer></script>
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
                            <th>ผู้ยืม</th>
                            <th>วันที่</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->accessorie->access_name}}</td>
                            <td>{{Helper::convertQty($item->qty)}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td><a href="{{route('it.lendings.edit',$item->id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">ข้อมูล</button></a></td>
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