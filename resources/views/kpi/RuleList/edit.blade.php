@extends('layouts.app')
@section('sidebar')
@include('includes.sidebar.kpi');
@stop
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>Rule Management
                <div class="page-title-subheading">This is an example rule management created using
                    build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button> --}}
            <div class="d-inline-block dropdown">
            </div>
        </div>
    </div>
</div>
{{-- end title  --}}

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Rule Management</h5>
            <div class="position-relative form-group">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ruleCategory">Rule Category :</label>
                            <select id="validationRuleCategory" class="form-control-sm form-control">
                                <option value="">Rule Category</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="ruleName">Rule Name :</label>
                            <input type="text" class="form-control form-control-sm" id="ruleName"
                                placeholder="Rule Name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="description">Description :</label>
                            <input type="text" class="form-control form-control-sm" id="description"
                                placeholder="Description">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="mesurement">Mesurement :</label>
                            <select id="validationMesurement" class="form-control-sm form-control">
                                <option value="">Mesurement</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="targetUnit">Target Unit :</label>
                            <select id="validationTargetUnit" class="form-control-sm form-control">
                                <option value="">Target Unit</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="calculationType">Calculation Type :</label>
                            <select id="validationCalculationType" class="form-control-sm form-control">
                                <option value="">Calculation Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <button class="mb-2 mr-2 btn btn-success">Save</button>
                            <button class="mb-2 mr-2 btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection