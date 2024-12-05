@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <div class="container py-5">
        @include('partials.session-msg')
        <div class="box-buttons mb-3">
            <!-- Create plate Button-->
            <a href="{{ route('admin.plates.create') }}" type="button" class="btn btn-sm btn-outline-turquoise me-3">
                Create new Plate
                <i class="bi bi-plus"></i>
            </a>
            <a href="{{ route('admin.plates.deleted-index') }}" type="button" class="btn btn-sm btn-turquoise">
                Go to bin
                <i class="bi bi-trash"></i>
            </a>
        </div>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col"><span class="turquoise">Id</span></th>
                    <th scope="col"><span class="turquoise">Name</span></th>
                    <th scope="col">
                        <p class="d-none d-lg-block turquoise p-0 m-0">Decription</p>
                        <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">Description</p>
                    </th>
                    <th scope="col">
                        <p class="d-none d-lg-block turquoise p-0 m-0">Ingredients</p>
                        <p class="d-lg-none text-truncate turquoise p-0 m-0" style="max-width: 50px;">Ingredients</p>
                    </th>
                    <th scope="col"><span class="turquoise">Price</span></th>
                    <th scope="col"><span class="turquoise">Visible</span></th>
                    <th scope="col" class="text-center"><span class="turquoise">Image</span></th>
                    <th scope="col"><span class="turquoise">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plates as $plate)
                    <tr>
                        <th scope="row">{{ $plate->id }}</th>
                        {{-- <td>
                    <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name. '\'s image'}}"
                        class="rounded-4 shadow">
                </td> --}}
                        <td>
                            <p class="d-none d-lg-block m-0">{{ ucwords($plate->name) }}</p>
                            <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">{{ $plate->name }}
                        </td>
                        <td>
                            <p class="d-none d-lg-block m-0">{{ substr($plate->description, 0, 50) . '...' }}</p>
                            <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">{{ $plate->description }}</p>
                        </td>
                        <td>
                            <p class="d-none d-lg-block m-0">{{ $plate->ingredient_description }}</p>
                            <p class="d-lg-none text-truncate m-0" style="max-width: 50px;">
                                {{ $plate->ingredient_description }}
                            </p>
                        </td>
                        {{-- <td>{{$plate->restaurant->name}}</td> --}}
                        {{-- <td>
                    <img src="{{asset('storage/'.$plate->restaurant->image)}}"
                        alt="{{$plate->restaurant->name. '\'s image'}}" class="rounded-4 shadow">
                </td> --}}
                        <td>{{ $plate->price }}&euro;</td>
                        <td>{{ $plate->visible ? 'Yes' : 'No' }}</td>
                        <td class="text-center">
                            <img src="{{ $plate->image }}" alt="{{ $plate->name . '\'s image' }}"
                                class="img rounded-4 shadow my-2">
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.plates.show', $plate) }}" class="btn btn-sm btn-turquoise"><i
                                        class="bi bi-eye-fill"></i></a>
                                <a href="{{ route('admin.plates.edit', $plate) }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-fill"></i></a>
                                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop-{{ $plate->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                {{-- ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️  Modal ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ --}}
                                <div class="modal fade" id="staticBackdrop-{{ $plate->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Deleting
                                                    {{ $plate->name }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete <span
                                                        class="fw-semibold">{{ $plate->name }}</span>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger delete-btn" type="submit" value="delete"
                                                        delete-data-name="{{ $plate->name }}"><i
                                                            class="bi bi-trash3-fill"></i></button>
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
                                Plates list is empty
                            </h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- <div>
        {{ $plates->links() }}
    </div> --}}
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/delete-confirmation.js');
@endsection
