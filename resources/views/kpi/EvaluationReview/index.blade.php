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
            <div>Review Evaluate
                <div class="page-title-subheading">This is an example review evaluate created using
                    build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
            {{-- <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled href="javascript:void(0);" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
{{-- end title  --}}

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Form search</h5>
            <div class="position-relative form-group">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label for="department">Department :</label>
                            <select name="department" id="validationDepartment" class="form-control-sm form-control">
                                <option value="">department</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="position">Position :</label>
                            <select name="position" id="validationPosition" class="form-control-sm form-control">
                                <option value="">Position</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="status">Status :</label>
                            <select name="status" id="validationStatus" class="form-control-sm form-control">
                                <option value="">Submit to manager</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="year">Year :</label>
                            <select name="year" id="validationYear" class="form-control-sm form-control">
                                @foreach (range(date('Y'),$start_year) as $year)
                                <option value="">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="period">Period :</label>
                            <select name="period" id="validationPeriod" class="form-control-sm form-control">
                                <option value="">Period</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button class="mb-2 mr-2 btn btn-primary mt-4 ml-3" type="submit">Search</button>
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
            <h5 class="card-title">Staff List</h5>
            <div class="table-responsive">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Staff Name</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Year</th>
                            <th>Period</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mr.Pipat</td>
                            <td>IT</td>
                            <td>Program</td>
                            <td>2021</td>
                            <td>January</td>
                            <td>Submit to Manager</td>
                            <td><a href="{{route('kpi.evaluation-review.edit',1)}}"
                                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-info">Review
                                </a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Mr.Test</td>
                            <td>IT</td>
                            <td>Program</td>
                            <td>2021</td>
                            <td>January</td>
                            <td>Submit to Manager</td>
                            <td><a href="{{route('kpi.evaluation-review.edit',1)}}"
                                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-info">Review
                                </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection