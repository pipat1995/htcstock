@extends('layouts.app')
@section('sidebar')
@include('includes.sidebar.admin');
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
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-12 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Form user') }}</h5>
                <form action="{{route('admin.users.update',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-3">
                            <input id="name" type="text" class="form-control-sm form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" required autocomplete="name" readonly>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-3">
                            <input id="email" type="email" class="form-control-sm form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" autocomplete="email" readonly>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="department"
                            class="col-md-3 col-form-label text-md-right">{{ __('Department') }}</label>

                        <div class="col-md-3">
                            <input id="department" type="text"
                                class="form-control-sm form-control @error('department') is-invalid @enderror" name="department"
                                value="{{ $user->department->name }}" autocomplete="department" readonly>

                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="roles" class="col-md-3 col-form-label text-md-right">{{ __('Role') }}</label>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($roles as $role)
                            <div class="form-check col-md-4" style="margin-top: 10px;">
                                <input type="checkbox" name="roles[]" id="role{{$role->id}}" value="{{$role->id}}"
                                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label>{{$role->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('roles')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div> --}}
            {{-- <a class="btn btn-warning mr-2" type="button" href="{{url()->previous()}}">Back</a> --}}
            {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
            </form>
            <script src="{{asset('assets\js\admin\user.js')}}"></script>
        </div>
    </div>
</div>
</div>
<br>
<div class="row">
    <div class="col-md-3">
        <div class="main-card mb-3 card">
            <div class="card-header">Role for users
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        {{-- <button class="active btn btn-focus">Last Week</button> --}}
                        <button class="btn btn-focus" data-toggle="modal"
                        data-target=".bd-system-modal-lg">Add</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($userRoles)
                        @foreach ($userRoles as $key => $item)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->name}}</div>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                {{-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="main-card mb-3 card">
            <div class="card-header">System for users
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        {{-- <button class="active btn btn-focus">Last Week</button> --}}
                        <button class="btn btn-focus" data-toggle="modal"
                            data-target=".bd-role-modal-lg">Add</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($userSystems)
                        @foreach ($userSystems as $key => $item)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->name}}</div>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                {{-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button> --}}
            </div>
        </div>
    </div>
</div>

<!-- System add user modal -->

<div class="modal fade bd-system-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add system</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Role add user modal -->

<div class="modal fade bd-role-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop