@extends('layouts.app')
@section('sidebar')
@include('includes.legal_sidebar');
@stop
@section('content')
<!-- Back to top button -->
<a id="btnontop"></a>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-gavel icon-gradient bg-happy-fisher"> </i>
            </div>
            <div>Legal Contract
                <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('legal.contract-request.create')}}" class="btn-shadow btn btn-info"
                    data-toggle="tooltip" title="create contract" data-placement="bottom">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </span>
                    Create</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('legal.contract-request.index')}}" method="GET">
                <div class="form-row">
                    <div class="col-md-2 mb-2">
                        <select class="form-control js-select-status-multiple" name="status[]" multiple>
                            @isset($status)
                            @foreach ($status as $item)
                            <option value="{{$item}}" @if($selectedStatus->contains($item)) selected @endif>{{$item}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <select class="form-control js-select-agreements-multiple" name="agreement[]" multiple>
                            @isset($agreements)
                            @foreach ($agreements as $item)
                            <option value="{{$item->id}}" @if($selectedAgree->contains($item->id)) selected @endif>{{$item->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn-shadow btn btn-info" type="submit" data-toggle="tooltip"
                            title="search contract" data-placement="bottom">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </span>
                            Search</button>
                    </div>
                </div>
            </form>
            <script src="{{asset('assets\js\legals\contractRequestForm\create.js')}}"></script>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Table with hover</h5>
            <div class="table-responsive">
                <table class="mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full name (Company’s, Person’s) </th>
                            <th>Legal Representative </th>
                            <th>Legal Agreement </th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->company_name}}</td>
                            <td>{{$item->representative}}</td>
                            <td>{{$item->legalAgreement->name}}</td>
                            @if ($item->status === 'request')
                            <td><span class="badge badge-pill badge-primary">{{$item->status}}</span></td>
                            @endif
                            @if ($item->status === 'checking')
                            <td><span class="badge badge-pill badge-info">{{$item->status}}</span></td>
                            @endif
                            @if ($item->status === 'providing')
                            <td><span class="badge badge-pill badge-warning">{{$item->status}}</span></td>
                            @endif
                            @if ($item->status === 'complete')
                            <td><span class="badge badge-pill badge-success">{{$item->status}}</span></td>
                            @endif

                            <td><a href="{{route('legal.contract-request.show',$item->id)}}" data-toggle="tooltip"
                                    title="view contract" data-placement="bottom"
                                    class="btn btn-success btn-sm float-left ml-1"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                                @if ($item->status === 'request')
                                <a href="{{route('legal.contract-request.edit',$item->id)}}" data-toggle="tooltip"
                                    title="edit contract" data-placement="bottom"
                                    class="btn btn-primary btn-sm float-left ml-1"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i></a>
                                @endif
                                <a href="{{route('legal.pdf',$item->id)}}" data-toggle="tooltip"
                                    title="view contract PDF" data-placement="bottom" target="_blank"
                                    rel="noopener noreferrer" class="btn btn-danger btn-sm float-left ml-1"><i
                                        class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contracts->links() }}
        </div>
    </div>
</div>
@stop