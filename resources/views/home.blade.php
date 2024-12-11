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
                        <a href="{{ route('verification.notice') }}" class="btn btn-link p-0 m-0 align-baseline">Click here to
                            send the verification email</a>.
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
            @if (session('first_login'))
                <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--                     <div class="alert alert-success" role="alert">
                        {{ __('You are logged in!') }}
                    </div> --}}
                    <div class="toast text-bg-success position-fixed top-5 end-5 z-1" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <strong class="me-auto">Success</strong>
                            <small>{{ \App\Helpers\DateTimeHelper::getHourNow() }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
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
                                <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}" class="img-fluid">
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
                            <label class="col-md-4 col-form-label text-md-end turquoise">{{ __('Tipologies') }}</label>
                            <div class="col-md-6">
                                <ul class="form-control-plaintext list-unstyled">
                                    @foreach ($restaurant->tipologies as $tipology)
                                        <li>{{ $tipology->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/toast-control.js');
@endsection
