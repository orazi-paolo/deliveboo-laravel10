@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <form action="@yield('form-action')" class="form-control w-75 shadow p-5" method="POST"
        enctype="multipart/form-data">
        @csrf
        @yield('form-method')

        <h2 class="text-decoration-underline text-center mb-3">@yield('form-title')</h2>
        {{-- <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="image" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="image" id="image" value="{{old('name', $plate->image)}}">
                @error('image')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div> --}}
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="name" class="form-label">Plate Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name', $plate->name)}}">
                @error('name')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="ingredient_description" class="form-label">Ingredients Description</label>
                <textarea class="form-control" name="ingredient_description" id="ingredient_description"
                    rows="3">{{old('ingredient_description', $plate->ingredient_description)}}</textarea>
                @error('description')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"
                    rows="3">{{old('description', $plate->description)}}</textarea>
                @error('ingredient_description')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price"
                    value="{{old('price', $plate->price)}}">
                @error('price')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <input type="checkbox" name="visible" class="form-check-input" value="1" id="visible" {{ old('visible',
                    $plate->visible ?? false) ? 'checked' : '' }}>
                <label for="visible" class="form-check-label">Visible</label>
                @error('visible')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="btns p-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
@endsection