@extends('layouts.app')

@section('content')
<div>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>รายการ อุปกรณ์
                    {{-- <div class="page-title-subheading">Tables are the backbone of almost all web
                        applications.
                    </div> --}}
                </div>
            </div>
            <div class="page-title-actions">
                {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button> --}}
                <div class="d-inline-block">
                    <button type="button" data-toggle="modal" data-target="#accessoriesModal"
                        class="btn-shadow  btn btn-info" data-param="">
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
                    <h5 class="card-title">อุปกรณ์</h5>
                    <table class="mb-0 table table-hover" id="table-access">
                        <thead>
                            <tr>
                                <th width="150px">action</th>
                                <th>Name</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accessories as $item)
                            <tr>
                                <td>
                                    @can('edit-users')
                                    <button class="edit btn btn-primary btn-sm float-left" data-toggle="modal"
                                        data-target="#accessoriesModal" data-param="{{$item->id}}">ข้อมูล</button>
                                    @endcan
                                    @can('delete-users')
                                    <form action="{{route('accessories.destroy',$item->id)}}" method="post"
                                        class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-sm">ลบ</button>
                                    </form>
                                    @endcan
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->unit}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<x-access-modal />
@endsection

@section('script')
<script src="{{ asset('js/api/index.js') }}" defer></script>
<script src="{{ asset('js/accessories/index.js') }}" defer></script>
@endsection