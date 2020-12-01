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
            <div>{{ __('itstock.manage-accessorie.edit-equipment') }}
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
                {{-- <a href="{{route('it.buy.create')}}" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-business-time fa-w-20"></i>
                </span>
                ซื้อ</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">{{ __('itstock.manage-accessorie.equipment-form') }}</h5>
            <form class="needs-validation" novalidate action="{{route('it.accessories.update',$accessorie->access_id)}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationAccess_name">{{ __('itstock.manage-accessorie.name') }}</label>
                        <input type="text" class="form-control" id="validationAccess_name" name="access_name"
                            value="{{$accessorie->access_name}}" required>
                        <div class="invalid-feedback">
                            Please provide a valid Name.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationUnit">{{ __('itstock.manage-accessorie.unit') }}</label>
                        <input type="text" class="form-control" id="validationUnit" name="unit"
                            value="{{$accessorie->unit}}" required>
                        <div class="invalid-feedback">
                            Please provide a valid Unit.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" style="margin-top: 5px">{{ __('itstock.manage-accessorie.submit-form') }}</button>
            </form>

            <script src="{{asset('assets\js\transactions\accessorie.js')}}"></script>
        </div>
    </div>
</div>
@stop