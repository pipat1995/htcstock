@extends('layouts.app')
@section('noti')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="toast btn-warning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <small>3 ms</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{$error}}
    </div>
</div>
@endforeach
@endif
@if (session('create'))
<div class="toast btn-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <small>3 ms</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{session('create')}}
    </div>
</div>
@endif

@endsection

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                </i>
            </div>
            <div>Users Management
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
                <h5 class="card-title">Users</h5>
                <table class="mb-0 table table-hover" id="table-access">
                    <thead>
                        <tr>
                            <th width="150px">action</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
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
<x-access-modal />
@endsection

@section('script')
{{-- <script src="{{ asset('js/api/index.js') }}" defer></script> --}}
<script>

</script>
{{-- <script src="{{ asset('js/accessories/index.js') }}" defer></script> --}}
@endsection