@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <div class="container-fluid py-5">
        @include('partials.session-msg')
        <div class="box-buttons mb-3">
            @include('partials.go-back-btn')
        </div>
        <table class="table align-middle table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col"><span class="turquoise">Id</span></th>
                    <th scope="col"><span class="turquoise">Name</span></th>
                    <th scope="col" class="d-none d-sm-table-cell">
                        <p class="d-none d-lg-block turquoise p-0 m-0">Decription</p>
                        <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">
                            Description</p>
                    </th>
                    <th scope="col" class="d-none d-sm-table-cell">
                        <p class="d-none d-lg-block turquoise p-0 m-0">Ingredients</p>
                        <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">
                            Ingredients</p>
                    </th>
                    <th scope="col"><span class="turquoise">Price</span></th>
                    <th scope="col"><span class="turquoise">Visible</span></th>
                    <th scope="col" class="text-center d-none d-sm-table-cell"><span class="turquoise">Image</span>
                    </th>
                    <th scope="col"><span class="turquoise">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plates as $plate)
                    <tr>
                        <th scope="row">{{ $plate->id }}</th>
                        <td>
                            <p class="d-none d-lg-block m-0">{{ ucwords($plate->name) }}</p>
                            <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">{{ $plate->name }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if ($plate->description)
                                <p class="d-none d-lg-block m-0" style="max-width: 300px;">
                                    {{ substr($plate->description, 0, 20) . '...' }}</p>
                                <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">
                                    {{ substr($plate->description, 0, 20) . '...' }}</p>
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if ($plate->ingredient_description)
                                <p class="d-none d-lg-block m-0">
                                    {{ substr($plate->ingredient_description, 0, 20) . '...' }}</p>
                                <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">
                                    {{ substr($plate->ingredient_description, 0, 20) . '...' }}
                                </p>
                            @endif
                        </td>
                        <td>{{ $plate->price }}&euro;</td>
                        <td> {{ $plate->visible ? 'Yes' : 'No' }} </td>
                        <td class="text-center d-none d-sm-table-cell">
                            @if ($plate->image)
                                <img src="{{ asset('/storage/' . $plate->image) }}" alt="{{ $plate->name . '\'s image' }}"
                                    class="plate-image rounded-2 shadow my-2">
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <form action="{{ route('admin.plates.restore', $plate) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-outline-turquoise delete-btn" type="submit"
                                        value="delete" delete-data-name="{{ $plate->name }}">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-turquoise" type="button" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop-{{ $plate->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                {{-- ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ Modal ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ --}}
                                <div class="modal fade" id="staticBackdrop-{{ $plate->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Permanent
                                                    Deleting
                                                    {{ $plate->name }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to <span
                                                        class="text-danger fw-semibold">permanent</span> delete
                                                    <span class="fw-semibold">{{ $plate->name }}</span>?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.plates.force-delete', $plate) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger delete-btn permanently-delete"
                                                        type="submit" value="delete"
                                                        delete-data-name="{{ $plate->name }}">Delete Permanently</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ⬆️⬆️⬆️⬆️⬆️⬆️ Modal ⬆️⬆️⬆️⬆️⬆️⬆️ --}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <h5 class="d-flex justify-content-center fw-semibold">
                                Deleted Plates list is empty
                            </h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- <div>
        {{ $plates->links() }}
    </div> --}}
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/toast-control.js');
@endsection
