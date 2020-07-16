@extends('layouts.blank')

@section('content_blank')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <img class="mb-4" src="{{asset('assets/images/newhaier.png')}}" alt="LOGO">
    <h1 class="h3 mb-3 font-weight-normal">{{ __('เข้าสู่ระบบ') }}</h1>
    <label for="inputEmail" class="sr-only">{{ __('รหัสพนักงาน') }}</label>
    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username"
        value="{{ old('username') }}" placeholder="{{ __('รหัสพนักงาน') }}" required autocomplete="username" autofocus>
    @error('username')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="inputPassword" class="sr-only">{{ __('รหัสผ่าน') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        placeholder="{{ __('รหัสผ่าน') }}" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('จดจำฉัน') }}
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('เข้าสู่ระบบ') }}</button>
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('ลืมรหัสผ่านหรือไม่?') }}
    </a>
    @endif
    {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p> --}}
</form>
@endsection