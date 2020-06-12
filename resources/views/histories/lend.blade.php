@extends('layouts.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                </i>
            </div>
            <div>ยืม อุปกรณ์
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <button type="button" data-toggle="modal" data-target="#lendModal" class="btn-shadow  btn btn-info"
                    data-param="">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    เพิ่ม
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">รายการยืม</h5>
                <table class="mb-0 table table-hover" id="table-lend">
                    <thead>
                        <tr>
                            <th width="150px">#</th>
                            <th>อุปกรณ์</th>
                            <th>จำนวน</th>
                            <th>คนยืม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $item)
                        <tr>
                            <td>
                                @can('edit-users')
                                <button class="edit btn btn-success btn-sm float-left" data-toggle="modal"
                                    data-target="#lendModal" data-param="{{$item->id}}" data-lend="lend"> คืน </button>
                                <button class="edit btn btn-primary btn-sm float-left" data-toggle="modal"
                                    data-target="#lendModal" data-param="{{$item->id}}">ข้อมูล</button>
                                @endcan
                                @can('delete-users')
                                <form action="{{route('lend.destroy',$item->id)}}" method="post" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm">ลบ</button>
                                </form>
                                @endcan
                            </td>
                            <td>{{$item->accessorie->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->user_lending}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<x-lend-modal />
@endsection

@section('script')
<script src="{{ asset('js/api/index.js') }}" defer></script>
<script src="{{ asset('js/histories/index.js') }}" defer></script>
@endsection