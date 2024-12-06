@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <div class="container-fluid py-5">
        @include('partials.session-msg')
        <div class="box-buttons mb-3">
            @if (Route::is('admin.plates.index'))
                <a href="{{ route('admin.plates.create') }}" type="button" class="btn btn-sm btn-outline-turquoise me-3">
                    Create new Plate
                    <i class="bi bi-plus"></i>
                </a>
                <a href="{{ route('admin.plates.deleted-index') }}" type="button" class="btn btn-sm btn-turquoise">
                    Go to bin
                    <i class="bi bi-trash"></i>
                </a>
            @else
                @include('partials.go-back-btn')
            @endif
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col"><span class="turquoise">Id</span></th>
                        <th scope="col"><span class="turquoise">Name</span></th>
                        <th scope="col" class="d-none d-md-table-cell">
                            <p class="d-none d-lg-block turquoise p-0 m-0">Description</p>
                            <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">
                                Description</p>
                        </th>
                        <th scope="col" class="d-none d-md-table-cell">
                            <p class="d-none d-lg-block turquoise p-0 m-0">Ingredients</p>
                            <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">
                                Ingredients</p>
                        </th>
                        <th scope="col"><span class="turquoise">Price</span></th>
                        <th scope="col"><span class="turquoise">Visible</span></th>
                        <th scope="col" class="text-center d-none d-md-table-cell"><span class="turquoise">Image</span>
                        </th>
                        <th scope="col"><span class="turquoise">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plates as $plate)
                        <tr>
                            <th scope="row">{{ $plate->id }}</th>
                            <td>
                                <p class="d-none d-lg-block m-0">{{ $plate->getCapitalizedName() }}</p>
                                <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">{{ $plate->name }}
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if ($plate->description)
                                    <p class="d-none d-lg-block m-0">
                                        {{ $plate->getTruncatedDescription($plate->description) }}
                                    </p>
                                    <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">
                                        {{ $plate->description }}
                                    </p>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if ($plate->ingredient_description)
                                    <p class="d-none d-lg-block m-0">
                                        {{ $plate->getTruncatedDescription($plate->ingredient_description) }}
                                    </p>
                                    <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">
                                        {{ $plate->ingredient_description }}
                                    </p>
                                @endif
                            </td>
                            <td>{{ $plate->price }}&euro;</td>
                            <td>{{ $plate->visible ? 'Yes' : 'No' }}</td>
                            <td class="text-center d-none d-md-table-cell">
                                @if ($plate->image)
                                    <img src="{{ $plate->getStorageImage() }}" alt="{{ $plate->name . '\'s image' }}"
                                        class="plate-image rounded-2 shadow my-2">
                                @else
                                    <img src="{{ $plate->image_placeholder }}" alt="{{ $plate->name . '\'s image' }}"
                                        class="plate-image rounded-2 shadow my-2">
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if (Route::is('admin.plates.index'))
                                        <a href="{{ route('admin.plates.show', $plate) }}"
                                            class="btn btn-sm btn-turquoise"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{ route('admin.plates.edit', $plate) }}"
                                            class="btn btn-sm btn-outline-turquoise"><i class="bi bi-pencil-fill"></i></a>
                                    @else
                                        <form action="{{ route('admin.plates.restore', $plate) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-turquoise delete-btn" type="submit"
                                                value="delete" delete-data-name="{{ $plate->name }}">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <button class="btn btn-sm btn-turquoise" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $plate->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    {{-- ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️  Modal ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ --}}
                                    @include('partials.delete-modal', ['plate' => $plate])
                                    {{-- ⬆️⬆️⬆️⬆️⬆️⬆️ Modal ⬆️⬆️⬆️⬆️⬆️⬆️ --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <h5 class="d-flex justify-content-center fw-semibold">
                                    Plates list is empty
                                </h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $plates->links() }}
        </div>
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/toast-control.js');
@endsection
