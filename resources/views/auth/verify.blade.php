@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <div>
        <div class=" p-5 mt-5 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Please verify your email address</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
