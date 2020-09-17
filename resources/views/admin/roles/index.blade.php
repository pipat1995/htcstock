@extends('layouts.app')
@section('sidebar')
@include('includes.admin_sidebar');
@stop
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                </i>
            </div>
            <div>Permissions Management
                <div class="page-title-subheading">Tables are the backbone of almost all web
                    applications.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
            <div class="d-inline-block">
                <a href="{{route('admin.roles.create')}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    เพิ่ม</a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-lg-12"> --}}
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="#" method="GET">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="search">Search</label>
                    <input type="text" class="form-control" id="search" name="search" value="">
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
    </div>
</div>
{{-- </div> --}}
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Roles</h5>
                <table class="mb-0 table table-hover" id="table-roles">
                    <thead>
                        <tr>
                            <th width="150px">#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                <a href="{{route('admin.roles.edit',$role->id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">Edit</button></a>
                                @can('for-superadmin')
                                <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST"
                                    class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                </form>
                                @endcan


                            </td>
                            <td>{{$role->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $roles->links() }} --}}
        </div>
    </div>
</div>
@stop