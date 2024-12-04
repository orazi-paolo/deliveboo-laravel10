@extends('layouts.app')


@section('content')
    <div class="container">
        <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary text-decoration-none">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>
    </div>
    <div class="container py-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="turquoise">Id</th>
                    <th scope="col" class="turquoise">Name</th>
                    <th scope="col" class="turquoise">
                        <p class="d-none d-lg-block p-0 m-0">Decription</p>
                        <p class="d-lg-none text-truncate p-0 m-0" style="max-width: 50px;">Description</p>
                    </th>
                    <th scope="col" class="turquoise">
                        <p class="d-none d-lg-block p-0 m-0">Ingredients</p>
                        <p class="d-lg-none text-truncate p-0 m-0" style="max-width: 50px;">Ingredients</p>
                    </th>
                    <th scope="col" class="turquoise">Price</th>
                    <th scope="col" class="turquoise">Visible</th>
                    <th scope="col" class="turquoise">Action</th>
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
                        <td>{{ $plate->name }}</td>
                        <td>
                            <p class="d-none d-lg-block" style="max-width: 300px;">{{ $plate->description }}</p>
                            <p class="d-lg-none text-truncate" style="max-width: 50px;">{{ $plate->description }}</p>
                        </td>
                        <td>
                            <p class="d-none d-lg-block">{{ $plate->ingredient_description }}</p>
                            <p class="d-lg-none text-truncate" style="max-width: 50px;">{{ $plate->ingredient_description }}
                            </p>
                        </td>
                        {{-- <td>{{$plate->restaurant->name}}</td> --}}
                        {{-- <td>
                    <img src="{{asset('storage/'.$plate->restaurant->image)}}"
                        alt="{{$plate->restaurant->name. '\'s image'}}" class="rounded-4 shadow">
                </td> --}}
                        <td>{{ $plate->price }}</td>
                        <td> {{ $plate->visible ? 'Yes' : 'No' }} </td>

                        <td class="d-flex gap-1">
                            <form action="{{ route('admin.plates.restore', $plate) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-warning delete-btn" type="submit" value="delete"
                                    delete-data-name="{{ $plate->name }}">Restore</button>
                            </form>
                            <form action="{{ route('admin.plates.force-delete', $plate) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-btn permanently-delete" type="submit"
                                    value="delete" delete-data-name="{{ $plate->name }}">Delete Permanently</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h1>Trash is Empty</h1>
                @endforelse
            </tbody>
        </table>
        {{-- <div>
            {{ $plates->links() }}
        </div> --}}
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/permanently-delete-confirmation.js');
@endsection
