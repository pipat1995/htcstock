@extends('layouts.app')
@section('style')
<style>
    .select2-selection__rendered li {
        margin: 6px 0px 4px;
    }
</style>
@endsection
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
            <div>จัดการอุปกรณ์
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
                <a href="{{route('it.accessories.create')}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    เพิ่ม</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="#" method="GET">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control js-select-accessory-multiple" style="width: 100%" name="accessory[]" multiple>
                            @isset($accessorys)
                            @foreach ($accessorys as $item)
                            <option value="{{$item->access_id}}" @if($selectedAccessorys->contains($item->access_id))
                                selected @endif>{{$item->access_name}}
                            </option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn-shadow btn btn-info" type="submit">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </span>
                            Search</button>
                    </div>
                </div>
            </form>
            <script>
                function destroy(id) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure? '+id,
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('destroy-form'+id).submit();
                        }
                    })
                }
            </script>
            <script src="{{asset('assets\js\transactions\accessorie.js')}}" defer></script>
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
                            <th>อุปกรณ์</th>
                            <th>Unit</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($accessories)
                        @foreach ($accessories as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->access_name}}</td>
                            <td>{{$item->unit}}</td>
                            <td><a href="{{route('it.accessories.edit',$item->access_id)}}"><button type="button"
                                        class="btn btn-primary btn-sm float-left">ข้อมูล</button></a>

                                <button type="button" class="btn btn-danger btn-sm float-left"
                                    onclick="destroy({{$item->access_id}})">ลบ</button>
                                <form id="destroy-form{{$item->access_id}}"
                                    action="{{route('it.accessories.destroy',$item->access_id)}}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
            @isset($accessories)
            {{ $accessories->appends($query)->links() }}
            @endisset
        </div>
    </div>
</div>
@stop