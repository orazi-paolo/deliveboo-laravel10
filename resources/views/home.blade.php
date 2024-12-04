@extends('layouts.app')
@section('scss')
    @vite('resources/scss/register-login.scss')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!Auth::user()->hasVerifiedEmail())
            <div class="alert alert-warning">
                <strong>Attention!</strong> You have not verified your email address yet.
                    <a href="{{ route('verification.notice') }}" class="btn btn-link p-0 m-0 align-baseline">Click here to send the verification email</a>.
            </div>
            @endif
        </div>
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
