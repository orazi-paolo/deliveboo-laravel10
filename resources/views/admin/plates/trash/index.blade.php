@extends('layouts.app')

@section('content')
<div class="container py-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Ingredients Desription</th>
                <th scope="col">Restaurant Name</th>
                <th scope="col">Restaurant logo</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plates as $plate)
            <tr>
                <th scope="row">{{$plate->id}}</th>
                <td>
                    <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name. '\'s image'}}"
                        class="rounded-4 shadow">
                </td>
                <td>{{$plate->name}}</td>
                <td>{{$plate->description}}</td>
                <td>{{$plate->ingredient_description}}</td>
                <td>{{$plate->restaurant->name}}</td>
                <td>
                    <img src="{{asset('storage/'.$plate->restaurant->image)}}"
                        alt="{{$plate->restaurant->name. '\'s image'}}" class="rounded-4 shadow">
                </td>
                <td>{{$plate->price}}</td>

                <td class="d-flex gap-1">
                    <form action="{{route('admin.plates.restore', $plate)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm btn-danger delete-btn" type="submit" value="delete"
                            delete-data-name="{{$plate->name}}">Restore</button>
                    </form>
                    <form action="{{route('admin.plates.force-delete', $plate)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger delete-btn" type="submit" value="delete"
                            delete-data-name="{{$plate->name}}">Delete Permanently</button>
                    </form>
                </td>
            </tr>
            @empty
            abort(404)
            @endforelse
        </tbody>
    </table>
</div>
@endsection