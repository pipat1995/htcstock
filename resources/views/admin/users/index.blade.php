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
            <div>Users Management
                {{-- <div class="page-title-subheading">Tables are the backbone of almost all web
                        applications.
                    </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="#" method="GET">
                <div class="form-row">
                    <div class="col-md-2 mb-2">
                        <label for="search">Search</label>
                        <input type="text" class="form-control" id="search" name="search" value="{{$search}}">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="department">Department</label>
                        <select class="form-control js-select-department-multiple" name="department[]" multiple>
                            @isset($departments)
                            @foreach ($departments as $item)
                            <option value="{{$item->id}}" @if($selectedDept->contains($item->id)) selected @endif>{{$item->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="role">Role</label>
                        <select class="form-control js-select-role-multiple" name="user_role[]" multiple>
                            @isset($roles)
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}" @if($selectedRole->contains($item->id)) selected @endif>{{$item->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <button class="btn-shadow btn btn-info" type="submit" style="margin-top: 30px">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-fw" aria-hidden="true" title="Copy to use search"></i>
                            </span>
                            Search</button>
                    </div>
                </div>
            </form>
            <script>
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        $(".js-select-department-multiple").select2({
                            placeholder: 'Select department',
                            allowClear: true
                        });
                        $(".js-select-role-multiple").select2({
                            placeholder: 'Select role',
                            allowClear: true
                        });
                    }, false);
                })();
            </script>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <table class="mb-0 table table-hover" id="table-users">
                    <thead>
                        <tr>
                            <th width="150px">action</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Dept</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <a href="{{route('admin.users.edit',$user->id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">Edit</button></a>
                                {{-- @can('super-admin') เรียกใช้จาก AuthServiceProvider --}}
                                @can('super-admin')
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post"
                                    class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                </form>
                                @endcan


                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                {{-- <div class="badge badge-warning"> --}}
                                {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                {{-- </div> --}}
                            </td>
                            <td>{{$user->department->name}}</td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
            {{ $users->appends($query)->links() }}
        </div>
    </div>
</div>
@stop