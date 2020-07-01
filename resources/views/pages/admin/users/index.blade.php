@extends('layouts.app')
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
                    <div class="col-md-4 mb-3">
                        <label for="search">Search</label>
                        <input type="text" class="form-control" id="search" name="search"
                            value="{{$formSearch->search}}">
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
            <script>
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        
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
                            <th>Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{-- @can('edit-users') เรียกใช้จาก AuthServiceProvider --}}
                                @can('edit-users')
                                <a href="{{route('admin.users.edit',$user->id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">Edit</button></a>
                                @endcan
                                @can('delete-users')
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
                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</div>
@stop