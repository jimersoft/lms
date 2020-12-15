@extends('User::Front.master')
@section('content')
    <form action="{{ route('password.showResetForm') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="/img/weblogo.png" alt="">
        </a>

        <div class="form-content form-account">

            <input id="password" type="password" class="txt-l txt  @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password" placeholder="رمز جدید">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror


            <input id="password-confirm" type="password" class="txt-l txt"
                   name="password_confirmation" required autocomplete="new-password" placeholder="تایید رمز جدید">
            <br>
            <button type="submit" class="btn btn--login">  تغییر رمز عبور
            </button>

        </div>
        <div class="form-footer">
            <a href="{{route('register')}}">صفحه ثبت نام</a>
        </div>
    </form>
@endsection
