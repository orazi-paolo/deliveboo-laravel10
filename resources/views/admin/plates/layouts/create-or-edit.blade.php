@extends('layouts.app')

@section('scss')
@vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
<div class="container">
    {{-- Go back button --}}
    <div class="box-buttons mb-3">
        @include('partials.go-back-btn')
    </div>
</div>
<div class="container d-flex justify-content-center">
    {{-- Form --}}
    <form action="@yield('form-action')" class="form-control w-md-75 shadow p-5" method="POST"
        enctype="multipart/form-data">
        @csrf
        @yield('form-method')
        {{-- Form title --}}
        <h2 class="text-decoration-underline text-center turquoise mb-3">@yield('form-title')</h2>

        {{-- Imagine input --}}
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="image" class="form-label turquoise">Choose Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                    value="{{ old('name', $plate->image) }}">
                {{-- Instruction Messages --}}
                @include('partials.input-instruction', ['instructionMessages' => [
                'The uploaded file must not exceed 2 MB in
                size (2048 kilobytes).'
                ], 'class'=>'d-block'])
                {{-- Errors message --}}
                @error('image')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Name input --}}
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="name" class="form-label turquoise">Plate Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $plate->name) }}" placeholder="e.g., Spaghetti Carbonara" autocomplete="off"
                    required>
                {{--Instruction Messages --}}
                @include('partials.input-instruction',['instructionMessages'=>[
                'The Plate name must be a text input no longer than 255 characters.'],])
                {{-- Errors message --}}
                @error('name')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Ingridients Input --}}
        <div class="row mb-3">
            <div class="col-12">
                <label for="ingredient_description" class="form-label turquoise">Ingredients Description</label>
                <textarea class="form-control @error('ngredient_description') is-invalid @enderror"
                    name="ingredient_description" id="ingredient_description" rows="3"
                    placeholder="e.g., Classic Italian pasta dish with a rich sauce made of eggs, Pecorino Romano cheese, pancetta, and black pepper for a creamy texture and bold flavor.">{{ old('ingredient_description', $plate->ingredient_description) }}</textarea>
                {{-- Errors message --}}
                @error('ingredient_description')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Decription input --}}
        <div class="row mb-3">
            <div class="col-12">
                <label for="description" class="form-label turquoise">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" rows="3"
                    placeholder="e.g., Traditional Italian pasta dish known for its rich and creamy sauce made with eggs, Pecorino Romano cheese, pancetta, and a touch of black pepper. Perfectly balanced flavors for an authentic taste experience.">{{ old('description', $plate->description) }}</textarea>
                {{-- Errors message --}}
                @error('description')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Price input --}}
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="price" class="form-label turquoise">Price *</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price', $plate->price) }}" placeholder="e.g., 123.00" required>
                {{-- Instruction Messages --}}
                @include('partials.input-instruction', ['instructionMessages'=>[
                'The price must be a number with up to 6 digits before the decimal point.',
                'And up to 2 digits after the decimal point.'],])
                {{-- Errors message --}}
                @error('price')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Visible check box --}}
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <input type="checkbox" name="visible" class="form-check-input @error('visible') is-invalid @enderror"
                    value="1" id="visible" {{ old('visible', $plate->visible ?? false) ? 'checked' : '' }}>
                <label for="visible" class="form-check-label turquoise">Visible</label>
                {{-- Instruction Messages --}}
                @include('partials.input-instruction', ['instructionMessages'=>['If checked, the plate will be published
                directly on the website.',], 'class'=>'d-block'])
                {{-- Errors message --}}
                @error('visible')
                @include('partials.input-validation-error-messages')
                @enderror
            </div>
        </div>
        {{-- Submit button --}}
        <div class="btns p-2">
            <button type="submit" class="btn btn-turquoise">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
@endsection
