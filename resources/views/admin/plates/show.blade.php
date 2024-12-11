@extends('layouts.app')

{{-- @section('scss')
@vite('resources/sass/plate-show.scss')
@endsection --}}

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <main>
        <div class="container">

            @include('partials.go-back-btn', ['route' => 'admin.plates.index'])

            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 my-5 g-5">
                <div class="col">
                    @if ($plate->image)
                        <img src="{{ $plate->image }}" alt="{{ $plate->name . '\'s image' }}" class="rounded-2 shadow my-2">
                    @else
                        <img src="{{ $plate->image_placeholder }}" alt="{{ $plate->name . '\'s image' }}"
                            class="rounded-2 shadow my-2">
                    @endif
                </div>
                <div class="col py-3">
                    <h5 class="turquoise">Plate details</h5>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">ID:</span>
                        {{ $plate->id }}
                    </p>
                    <p class="fw-bold">
                        <span class="fw-bold fst-italic text-wrap turquoise">Name:</span>
                        {{ strtoupper($plate->name) }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Ingredients:</span>
                        {{ $plate->ingredient_description }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Visibility:</span> {{ $plate->visible ? 'Yes' : 'No' }}
                        <span class="fst-italic" style="font-size: 12px">(This plate is visible for the Visitors)</span>
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Description:</span> {{ $plate->description }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Created at:</span> {{ $plate->created_at }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Updated at:</span> {{ $plate->created_at }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Price:</span> {{ $plate->price }} €
                    </p>
                    <p>
                        <span class="fw-bold fst-italic turquoise">Vote:</span>
                    </p>
                    <a href="{{ route('admin.plates.edit', $plate) }}" class="btn btn-sm btn-outline-turquoise">
                        <i class="bi bi-pencil-fill"> Edit this plate</i>
                    </a>
                    <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop-{{ $plate->id }}">
                        <i class="bi bi-trash"> Delete this plate</i>
                    </button>
                    {{-- ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ Modal ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ --}}
                    <div class="modal fade" id="staticBackdrop-{{ $plate->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                        {{ $plate->name }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are you sure you want to
                                        <span class="text-danger fw-semibold">
                                            Delete
                                        </span>
                                        <span class="fw-semibold">{{ $plate->name }}</span> ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-turquoise" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-turquoise delete-btn" type="submit" value="delete"
                                            delete-data-name="{{ $plate->name }}">
                                            Delete
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ⬆️⬆️⬆️⬆️⬆️⬆️ Modal ⬆️⬆️⬆️⬆️⬆️⬆️ --}}
                </div>
            </div>
        </div>

    </main>
@endsection
@section('add-script')
    @vite('resources/js/plates/toast-control.js');
@endsection
