@extends('layouts.app')

@section('content')
<main>
    <div class="container">

        <a href="{{ route('admin.plates.index') }}" class="text-decoration-none text-secondary">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 my-5 g-5">
            <div class="col">
                <img src="{{$plate->image}}" class="rounded-4 shadow">
            </div>
            <div class="col">
                <h1 class="fw-bold">{{strtoupper($plate->name)}}</h1>
                <p>
                    <span class="fw-bold fst-italic">Ingredients:</span> {{strtoupper($plate->ingredient_description)}}
                </p>
                <p>
                    <span class="fw-bold fst-italic">Description:</span> {{$plate->description}}
                </p>
            </div>
        </div>
    </div>

</main>
@endsection