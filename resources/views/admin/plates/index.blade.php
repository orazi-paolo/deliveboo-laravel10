@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Create plate Button-->
    <a href="{{route('admin.plates.create')}}" type="button" class="btn btn-sm btn-outline-info mb-3">
        Create new Plate
    </a>
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
                <th scope="row">{{$plate->id}}</th>
                {{-- <td>
                    <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name. '\'s image'}}"
                        class="rounded-4 shadow">
                </td> --}}
                <td>{{$plate->name}}</td>
                <td>
                    <p class="d-none d-lg-block">{{$plate->description}}</p>
                    <p class="d-lg-none text-truncate" style="max-width: 50px;">{{$plate->description}}</p>
                </td>
                <td>
                    <p class="d-none d-lg-block">{{$plate->ingredient_description}}</p>
                    <p class="d-lg-none text-truncate" style="max-width: 50px;">{{$plate->ingredient_description}}</p>
                </td>
                {{-- <td>{{$plate->restaurant->name}}</td> --}}
                {{-- <td>
                    <img src="{{asset('storage/'.$plate->restaurant->image)}}"
                        alt="{{$plate->restaurant->name. '\'s image'}}" class="rounded-4 shadow">
                </td> --}}
                <td>{{$plate->price}}</td>
                <td> {{($plate->visible)? 'Yes' : 'No'}} </td>
                <td class="d-flex gap-1">
                    <a href="{{route('admin.plates.show', $plate)}}" class="btn btn-sm btn-success"><i
                            class="bi bi-eye-fill"></i></a>
                    <a href="{{route('admin.plates.edit', $plate)}}" class="btn btn-sm btn-warning"><i
                            class="bi bi-pencil-fill"></i></a>
                    <form action="{{route('admin.plates.destroy', $plate)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger delete-btn" type="submit" value="delete"
                            delete-data-name="{{$plate->name}}"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <h1>Plates list is Empty</h1>
            @endforelse
        </tbody>
    </table>
</div>
@endsection