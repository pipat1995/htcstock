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
            <div>Rule Search
                <div class="page-title-subheading">This is an example rule search created using
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
                <a href="{{route('kpi.rule.create')}}"
                    class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Create
                </a>
            </div>
        </div>
    </div>
</div>
{{-- end title  --}}

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Rule Search</h5>
            <div class="position-relative form-group">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ruleName">Rule Name :</label>
                            <input type="text" class="form-control form-control-sm" id="ruleName"
                                placeholder="Rule Name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="ruleCategory">Rule Category :</label>
                            <select id="validationRuleCategory" class="form-control-sm form-control">
                                <option value="">Rule Category</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button class="mb-2 mr-2 btn btn-primary mt-4">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Rule List</h5>
            <div class="table-responsive">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rule Name</th>
                            <th>Rule Category</th>
                            <th>#</th>
                            {{-- <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Seller Target</td>
                            <td></td>
                            <td><a href="{{route('kpi.rule.edit',1)}}"
                                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-info">Edit
                                </a></td>
                            {{-- <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td> --}}
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Quality Controll</td>
                            <td></td>
                            <td><a href="{{route('kpi.rule.edit',1)}}"
                                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-info">Edit
                                </a></td>
                            {{-- <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection