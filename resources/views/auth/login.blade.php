@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="auth-pages p-5 mt-5" style="background: #f8f8f8; border-radius: 5px;">
        <div class="auth-left">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2 class="light-text-color">Returning Customer</h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <label class="signup-label light-text-color" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <label class="signup-label light-text-color" for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Login</button>
                    <label class="light-text-color">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2 class="light-text-color">New Customer</h2>
            {{--<div class="spacer"></div>
            <p><strong>Save time now.</strong></p>
            <p>You don't need an account to checkout.</p>
            <div class="spacer"></div>
            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">Continue as Guest</a>
            <div class="spacer"></div>--}}

            <div class="spacer"></div>
            <p class="light-text-color"><strong>Save time later.</strong></p>
            <p class="light-text-color">Create an account for fast checkout and easy access to order history.</p>
            <div class="spacer"></div>
            <a href="{{ route('register') }}" class="auth-button-hollow">Create Account</a>

        </div>
    </div>
</div>
@endsection
