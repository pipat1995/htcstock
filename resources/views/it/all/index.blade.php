@extends('layouts.app')
@section('sidebar')
@include('includes.sidebar.it');
@stop
@section('content')
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
        <div class="row">
            @for ($i = 0; $i < 20; $i++) <div class="col-md-4">
                <div class="main-card mb-3 card"><img width="100%"
                        src="{{url('storage/it/manage/accessories/20201218/test.jpg')}}"
                        alt="Card image cap" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle">Card subtitle</h6>Some quick example text to build on the card title
                        and make up the bulk of the card's content.
                        <button class="btn btn-secondary">Button</button><br>
                        {{ url('storage/it/manage/accessories/20201218/test.jpg') }}
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>
@stop