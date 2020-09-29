@extends('layouts.app')
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
            <div>Legal Contract
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
                <a href="{{route('legal.contract-request.create')}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    เพิ่ม</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('legal.contract-request.index')}}" method="GET">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        {{-- <label for="validationSearch">เลข IR</label> --}}
                        <input type="text" class="form-control" id="validationSearch" name="search"
                            value="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn-shadow btn btn-info" type="submit">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            ค้นหา</button>
                    </div>
                </div>
            </form>
            <script src="{{asset('assets\js\legals\contractRequestForm\create.js')}}"></script>
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
                            <th>Unit</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($accessories as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->access_name}}</td>
                            <td>{{$item->unit}}</td>
                            <td><a href="{{route('it.accessories.edit',$item->access_id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">ข้อมูล</button></a>

                                <button type="button" class="btn btn-danger btn-sm float-left"
                                    onclick="destroy({{$item->access_id}})">ลบ</button>
                                <form id="destroy-form{{$item->access_id}}"
                                    action="{{route('it.accessories.destroy',$item->access_id)}}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                        </tr>

                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            {{-- {{ $accessories->links() }} --}}
        </div>
    </div>
</div>
@stop