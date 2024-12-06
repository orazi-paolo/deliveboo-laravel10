@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-show.scss')
@endsection

@section('content')
    <main>
        <div class="container">

            <a href="{{ route('admin.plates.index') }}" class="text-decoration-none text-secondary">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 my-5 g-5">
                <div class="col">
                    @if ($plate->image)
                        <img src="{{ $plate->getStorageImage() }}" alt="{{ $plate->name . '\'s image' }}"
                            class="plate-image rounded-2 shadow my-2">
                    @else
                        <img src="{{ $plate->image_placeholder }}" alt="{{ $plate->name . '\'s image' }}"
                            class="plate-image rounded-2 shadow my-2">
                    @endif
                </div>
                <div class="col">
                    <h1 class="fw-bold">{{ strtoupper($plate->name) }}</h1>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Ingredients:</span>
                        {{ $plate->ingredient_description }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Description:</span> {{ $plate->description }}
                    </p>
                </div>
            </div>
        </div>

    </main>
@endsection
