@extends('layouts.app')

@section('scss')
@vite('resources/sass/register-login.scss')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-header fw-bold">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end turquoise">Email *</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end turquoise">Password *</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end turquoise">Business Name *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end turquoise">Address *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end turquoise">City *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                                    name="city" value="{{ old('city') }}" required>
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="VAT" class="col-md-4 col-form-label text-md-end turquoise">VAT *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('VAT') is-invalid @enderror" id="VAT"
                                    name="VAT" value="{{ old('VAT') }}" required>
                                @error('VAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end turquoise">Description of your business *</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="4"
                                    required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end turquoise">Image of your business *</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" accept="image/*" required>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipologies" class="col-md-4 col-form-label text-md-end turquoise">Tipologies *</label>
                            <div class="col-md-6">
                                @foreach ($tipologies as $tipology)
                                <div class="form-check">
                                    <input class="form-check-input @error('tipologies') is-invalid @enderror" type="checkbox"
                                        name="tipologies[]" id="tipology-{{ $tipology->id }}" value="{{ $tipology->id }}" {{
                                        in_array($tipology->id, old('tipologies', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tipology-{{ $tipology->id }}">
                                        {{ $tipology->name }}
                                    </label>
                                </div>
                                @endforeach
                                @error('tipologies')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-turquoise">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
