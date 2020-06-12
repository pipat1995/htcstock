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