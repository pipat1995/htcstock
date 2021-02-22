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
                            <input type="text" class="form-control form-control-sm" id="ruleTemplateName" name="name"
                                placeholder="Rule template name" value="{{$ruletemplate->template->name}}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="department">Department :</label>
                            <select id="validationDepartment" class="form-control-sm form-control" name="department_id"
                                required>
                                @isset($departments)
                                @foreach ($departments as $item)
                                <option value="{{$item->id}}" {{$item->id === $ruletemplate->template->department->id}}>
                                    {{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Department.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
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

@isset($category)
@foreach ($category as $group)
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">{{$group->name}}</h5>
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
                        <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            data-group="{{$group}}">Add new rule</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table table-sm" id="table-{{$group->name}}">
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
                            <td colspan="9">
                                <p>No result ..</p>
                            </td>
                        </tr>
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
                        {{-- <tr>
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
                        </tr> --}}
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
@endforeach
@endisset

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

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Rule to : </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="rule-name">Rule Name :</label>
                        <select id="validationRuleName" class="form-control-sm form-control" name="rule_id" required>
                        </select>
                        {{-- <label for="rule-name" class="col-form-label">Group:</label>
                        <input type="text" class="form-control" id="recipient-name"> --}}
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('second-script')
<script src="{{asset('assets\js\kpi\ruleTemplate\edit.js')}}" defer></script>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var group = button.data('group') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    setOption(group)
    // console.log(recipient)

    // modal.find('.modal-title').text('New Rule to : ' + recipient)
    // modal.find('.modal-body input').val(recipient)
    })

    $('#exampleModal').on('hide.bs.modal', function (event) {
        document.getElementById('validationRuleName').innerHTML = ''
    })

const setOption = (group) => {
            getRuleDropdown().then(result => {
                let newArray = result.filter(value => value.category_id == group.id)
                newArray.forEach(element => {
                    let option = document.createElement("option")
                    option.text = element.name
                    option.value = element.id
                    document.getElementById('validationRuleName').appendChild(option)
                });
            })
        }

</script>
@endsection