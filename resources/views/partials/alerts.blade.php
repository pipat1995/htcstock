@if (session('success'))
<div class="alert alert-success fade show" role="alert">{{session('success')}} </div>
@endif

@if (session('warning'))
<div class="alert alert-warning fade show" role="alert">{{session('warning')}} </div>
@endif

@if (session('error'))
<div class="alert alert-danger fade show" role="alert">{{session('error')}} </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @if (session('success'))
<div class="toast btn-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <small>3 ms</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{session('success')}}
</div>
</div>
@endif

@if (session('warning'))
<div class="toast btn-warning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <small>3 ms</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{session('warning')}}
    </div>
</div>
@endif

@if (session('error'))
<div class="toast btn-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <small>3 ms</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{session('error')}}
    </div>
</div>
@endif --}}