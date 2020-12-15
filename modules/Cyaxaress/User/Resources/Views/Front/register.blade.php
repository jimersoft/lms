@extends('User::Front.master')
@section('content')
    <form method="POST" class="form" action="{{ route('register') }}">
        @csrf
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <input id="name" type="text" class="txt @error('name') is-invalid @enderror"
                   placeholder="نام و نام خانوادگی" name="name" value="{{ old('name') }}" required autocomplete="name"
                   autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror


            <input id="email" type="email" class="txt txt-l @error('email') is-invalid @enderror"
                   placeholder="ایمیل"  name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
            @enderror


            <input id="email" type="mobile" class="txt txt-l @error('mobile') is-invalid @enderror"
            placeholder="موبایل"  name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

            @error('mobile')
            <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
            @enderror

            <input id="password" type="password" class="txt txt-l @error('password') is-invalid @enderror"
           placeholder="رمز عبور" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
            @enderror


            <input id="password-confirm" type="password" class="txt txt-l"
                   placeholder="تکرار رمز عبور" name="password_confirmation" required autocomplete="new-password">

            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn continue-btn">ثبت نام و ادامه</button>

        </div>
        <div class="form-footer">
            <a href="{{'login'}}">صفحه ورود</a>
        </div>
    </form>


@endsection

{{--
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
<form method="POST" action="{{ route('register') }}">
@csrf

<div class="form-group row">
<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

<div class="col-md-6">
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="form-group row">
<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

<div class="col-md-6">
*<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="form-group row">
<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
 name="password" required autocomplete="new-password">

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="form-group row">
<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

<div class="col-md-6">
<input id="password-confirm" type="password" class="form-control"
 name="password_confirmation" required autocomplete="new-password">
</div>
</div>

<div class="form-group row mb-0">
<div class="col-md-6 offset-md-4">
<button type="submit" class="btn btn-primary">
{{ __('Register') }}
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
--}}
