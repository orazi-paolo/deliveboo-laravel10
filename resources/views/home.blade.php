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
        @if(session('first_login'))
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
        @endif
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-header fw-bold turquoise">{{ __('Your restaurant details') }}</div>

                <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6 d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $restaurant->name }}</p>
                        </div>
                        <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $restaurant->description }}</p>
                        </div>
                        <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $restaurant->address }}</p>
                        </div>
                        <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('City') }}</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $restaurant->city }}</p>
                        </div>
                        <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('VAT') }}</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $restaurant->VAT }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
