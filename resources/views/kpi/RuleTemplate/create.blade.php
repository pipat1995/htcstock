@extends('layouts.app')
@section('sidebar')
@include('includes.sidebar.kpi');
@stop
@section('style')
<style>
    .bs-example {
        margin: 20px;
    }
</style>
@endsection
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
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="ruleTemplateName">Rule template name :</label>
                        <input type="text" class="form-control form-control-sm" id="validationTemplate" name="name"
                            value="{{$template->name}}" placeholder="Rule template name" readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Rule template.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="department">Department :</label>
                        <input type="text" class="form-control form-control-sm" id="validationDepartment"
                            name="department" value="{{$template->department->name}}" placeholder="Rule template name"
                            readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Department.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        {{-- <button class="mb-2 mr-2 btn btn-primary mt-4" type="submit">Save</button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@isset($category)
<div id="all-table">
    @foreach ($category as $group)
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{$group->name}}</h5>
                <div class="card-header">
                    <label for="department" class="mb-2 mr-2">Weight :</label>
                    <div class="btn-actions-pane">
                        <div role="group" class="btn-group-sm btn-group">
                            <input class="mb-2 mr-2 form-control-sm form-control" type="number" min="0" step="0.01"
                                id="weight-{{$group->name}}" name="weight_{{$group->name}}">
                        </div>
                    </div>
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="mb-2 mr-2 btn btn-danger" onclick="deleterule(this)" data-group="{{$group->name}}" data-group-id="{{$group->id}}">Delete Selected Rule</button>
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
                                <th>Sort numbers</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endisset
{{-- Button --}}
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
        </div>
        <div class="page-title-actions">
            {{-- <button class="mb-2 mr-2 btn btn-success">Save</button> --}}
            {{-- <button class="mb-2 mr-2 btn btn-danger">Delete</button> --}}
            <a href="{{ URL::previous() }}" class="mb-2 mr-2 btn btn-warning">Go Back</a>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Rule to : </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-ruletemplate">
                    <input type="hidden" name="parent_rule_template_id" value="">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="rule-name" class="">Rule Name
                                    :</label><select id="validationRuleName" class="form-control form-control-sm"
                                    name="rule_id" onchange="getValue(this)" required>
                                </select></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="base-line" class="">Base line
                                    :</label><input name="base_line" id="validationBaseLine" placeholder="BaseLine"
                                    type="number" min="0" step="0.1" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="max-result" class="">Max
                                    :</label>
                                <input name="max_result" id="validationMax" placeholder="Max result" type="number"
                                    min="0" step="0.1" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="target-config" class="">Target
                                    config
                                    :</label><input name="target_config" id="validationTargetConfig"
                                    placeholder="Target config" type="number" min="0" step="0.1"
                                    class="form-control form-control-sm" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="weight" class="">Weight
                                    :</label>
                                <input name="weight" id="validationWeight" placeholder="Weight" type="number" min="0"
                                    step="0.1" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="weight-category" class="">Weight
                                    category
                                    :</label><input name="weight_category" id="validationWeightCategory"
                                    placeholder="Weight category" type="number" min="0" step="0.1"
                                    class="form-control form-control-sm" readonly></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="subMitForm()">Add</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('second-script')
<script src="{{asset('assets\js\kpi\ruleTemplate\create.js')}}" defer></script>
<script>
    var template = {!!json_encode($template)!!}

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var group = button.data('group') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        setOptionModal(group)
        
        let row = document.getElementById(`table-${group.name}`).getElementsByTagName('tbody')[0].lastChild
        // modal.find('.modal-title').text('New Rule to : ' + recipient)
        modal.find('.modal-body input[name ="parent_rule_template_id"]').val(getLastRowNum(row))
        // modal.find('.modal-body input[name ="field"]').val(getLastRowNum(row))
        modal.find('.modal-body input[name ="weight_category"]').val(document.getElementById(`weight-${group.name}`).value)
    })

    $('#exampleModal').on('hide.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var group = button.data('group') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        document.getElementById('validationRuleName').innerHTML = ''
        modal.find('.modal-body input[name ="base_line"]').val('')
        modal.find('.modal-body input[name ="max_result"]').val('')
        modal.find('.modal-body input[name ="target_config"]').val('')
        modal.find('.modal-body input[name ="weight"]').val('')
        modal.find('.modal-body input[name ="weight_category"]').val('')
    })

    const setOptionModal = (group) => {
                getRuleDropdown(group).then(result => {
                    result.forEach(element => {
                        let option = document.createElement("option")
                        option.text = element.name
                        option.value = element.id
                        document.getElementById('validationRuleName').appendChild(option)
                    })
                })
            }
    const getValue = (sel) => {
        // console.log(sel,sel.options[sel.selectedIndex].value,sel.options[sel.selectedIndex].text)
    }
    
    const subMitForm = () => {
        let form = document.getElementById('form-ruletemplate')
        if (!form.checkValidity()) {
            form.requestSubmit()
        }
        let formData = new FormData(form)
            formData.append('template_id',template.id)
        // api post 
        // get template id in html
        postRuleTemplate(template,formData).then(res => {
            createRow(res.data)
            // close modal
        }).catch(error => {
            error.response.data.messages.forEach(value => {
                toastError(value)
            })
            toastClear()
        }).finally(res => {
            // zdfdf
        });
    }

    const createRow = (data) => {
        let tables = document.getElementById("all-table").querySelectorAll('table')
        tables.forEach(intable => {
            intable.getElementsByTagName('tbody')[0].innerHTML = ''
        });
        // console.log(data);
        tables.forEach(intable => {
            // console.log(intable.getElementsByTagName('tbody')[0]);
            let newArray = data.filter(value => value.rule.category.name === intable.id.substring(6))
            let sumWeight = newArray.reduce((accumulator, currentValue) => accumulator + currentValue.weight,0)
            newArray.forEach((element, key, array) => {
                let table = document.getElementById(intable.id)
                let body = table.getElementsByTagName('tbody')[0]
                let newRow = body.insertRow()
                let newCellCheck = newRow.insertCell()
                let div = document.createElement('div')

                div.className = 'custom-checkbox custom-control'

                let checkbox = document.createElement('input')

                checkbox.type = `checkbox`
                checkbox.name = `rule-${element.id}`
                checkbox.className = `custom-control-input`
                checkbox.id = element.id

                let label = document.createElement('label')

                label.classList.add('custom-control-label')
                label.htmlFor = element.id
                div.appendChild(checkbox)
                div.appendChild(label)
                newCellCheck.appendChild(div)

                let newCellName = newRow.insertCell()
                newCellName.textContent = element.id+' '+element.rule.name

                let newCellMeasurement = newRow.insertCell()
                newCellMeasurement.textContent = element.rule.measurement

                let newCellBaseLine = newRow.insertCell()
                newCellBaseLine.textContent = element.base_line.toFixed(2)

                let newCellMax = newRow.insertCell()
                newCellMax.textContent = element.max_result.toFixed(2)

                let newCellTarget = newRow.insertCell()
                newCellTarget.textContent = element.target_config.toFixed(2)

                let newCellWeight = newRow.insertCell()
                newCellWeight.textContent = element.weight.toFixed(2)

                let newCellParentRule = newRow.insertCell()
                newCellParentRule.appendChild(makeOption(element,key,array))

                if (key === array.length - 1){ 
                    let footter = table.getElementsByTagName('tfoot')[0]
                    footter.children[0].children[newCellWeight.cellIndex].textContent = sumWeight.toFixed(2)
                    document.getElementById(`weight-${element.rule.category.name}`).value = element.weight_category.toFixed(2)
                }
            })
        })
    }

    const getLastRowNum = (row) => {
            return row ? row.rowIndex + 1: 1
        }
    
    const makeOption = (obj,key,array) => {
        let select = document.createElement('select')
        select.id = `id-${obj.id}`
        select.name = `id-${obj.id}`
        select.className = `form-control form-control-sm`
        array.forEach(element => {
                let option = document.createElement('option')
                option.text = (parseInt(element.parent_rule_template_id))
                option.value = element.id
                option.defaultSelected = obj.parent_rule_template_id === element.parent_rule_template_id ? true : false
                select.appendChild(option)
        });
        select.setAttribute(`onchange`, `switchRow(this,${obj.rule.category_id})`)
        return select
    }

    const switchRow = (e,group) => {
        let formSwitch = {
            rule_template_id : e.offsetParent.parentNode.children[0].children[0].children[0].id,
            rule_to_id : e.options[e.selectedIndex].value,
            group_id : group
        }
        switRuleTemplate(template,formSwitch)
        .then(res => {
            createRow(res.data)
        })
        .catch(error => {
            console.log(error.response.data)
        })
    }

    const deleterule = e => {
        let table = document.getElementById(`table-${e.dataset.group}`)
        let form = {
            rule : [],
            group : {
                id:e.dataset.groupId,
                name:e.dataset.group
            }
        }
        for (const row of table.tBodies[0].rows) {
            let element = row.firstChild.firstChild.firstChild
            if (element.checked) {
                form.rule.push(element.id)
            }
        }
        deleteRuleTemplate(template,form)
        .then(res => {
            createRow(res.data)
        }).catch(error => {

        }).finally(() => {})
    }
</script>
@endsection