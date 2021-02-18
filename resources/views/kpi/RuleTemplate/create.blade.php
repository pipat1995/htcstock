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
            <div>Rule Template Detail Management
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
                            <label for="ruleTemplateName">Rule template name :</label>
                            <input type="text" class="form-control form-control-sm" id="ruleTemplateName"
                                placeholder="Rule template name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="department">Department :</label>
                            <select id="validationDepartment" class="form-control-sm form-control">
                                <option value="">Department</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            {{-- <button class="mb-2 mr-2 btn btn-primary mt-4">Search</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- KPI --}}
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">KPI</h5>
            <div class="card-header">
                <label for="department" class="mb-2 mr-2">Weight :</label>
                <div class="btn-actions-pane">
                    <div role="group" class="btn-group-sm btn-group">
                        <input class="mb-2 mr-2 form-control-sm form-control" type="text" id="">
                    </div>
                </div>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="mb-2 mr-2 btn btn-danger">Delete Selected Rule</button>
                        <button class="mb-2 mr-2 btn btn-primary">Add new rule</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rule Name</th>
                            <th>Measurement</th>
                            <th>Base line</th>
                            <th>Max</th>
                            <th>Target config</th>
                            <th>weight</th>
                            <th>Parent rule</th>
                            <th>Field</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                        id="exampleCheckboxKpi1" class="custom-control-input"><label
                                        class="custom-control-label" for="exampleCheckboxKpi1"></label></div>
                            </th>
                            <td>Rule 1</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                        id="exampleCheckboxKpi2" class="custom-control-input"><label
                                        class="custom-control-label" for="exampleCheckboxKpi2"></label></div>
                            </th>
                            <td>Rule 2</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Weight :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Key Task --}}
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Key Task</h5>
            <div class="card-header">
                <label for="department" class="mb-2 mr-2">Weight :</label>
                <div class="btn-actions-pane">
                    <div role="group" class="btn-group-sm btn-group">
                        <input class="mb-2 mr-2 form-control-sm form-control" type="text" id="">
                    </div>
                </div>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="mb-2 mr-2 btn btn-danger">Delete Selected Rule</button>
                        <button class="mb-2 mr-2 btn btn-primary">Add new rule</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rule Name</th>
                            <th>Measurement</th>
                            <th>Base line</th>
                            <th>Max</th>
                            <th>Target config</th>
                            <th>weight</th>
                            <th>Parent rule</th>
                            <th>Field</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                        id="exampleCheckboxKeyTask1" class="custom-control-input"><label
                                        class="custom-control-label" for="exampleCheckboxKeyTask1"></label></div>
                            </th>
                            <td>Rule 1</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                    id="exampleCheckboxKeyTask2" class="custom-control-input"><label
                                    class="custom-control-label" for="exampleCheckboxKeyTask2"></label></div>
                            </th>
                            <td>Rule 2</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Weight :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- OMG --}}
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">OMG</h5>
            <div class="card-header">
                <label for="department" class="mb-2 mr-2">Weight :</label>
                <div class="btn-actions-pane">
                    <div role="group" class="btn-group-sm btn-group">
                        <input class="mb-2 mr-2 form-control-sm form-control" type="text" id="">
                    </div>
                </div>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="mb-2 mr-2 btn btn-danger">Delete Selected Rule</button>
                        <button class="mb-2 mr-2 btn btn-primary">Add new rule</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rule Name</th>
                            <th>Measurement</th>
                            <th>Base line</th>
                            <th>Max</th>
                            <th>Target config</th>
                            <th>weight</th>
                            <th>Parent rule</th>
                            <th>Field</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                    id="exampleCheckboxOmg1" class="custom-control-input"><label
                                    class="custom-control-label" for="exampleCheckboxOmg1"></label></div>
                            </th>
                            <td>Rule 1</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="custom-checkbox custom-control"><input type="checkbox"
                                    id="exampleCheckboxOmg2" class="custom-control-input"><label
                                    class="custom-control-label" for="exampleCheckboxOmg2"></label></div>
                            </th>
                            <td>Rule 2</td>
                            <td></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><input class="mb-2 form-control-sm form-control" type="text" id=""></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Parent rule</option>
                                </select></td>
                            <td><select class="mb-2 form-control-sm form-control" id="">
                                    <option value="">Field</option>
                                </select></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Weight :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Button --}}
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
        </div>
        <div class="page-title-actions">
            <button class="mb-2 mr-2 btn btn-success">Save</button>
            <button class="mb-2 mr-2 btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@endsection