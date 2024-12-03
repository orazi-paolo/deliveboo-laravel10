@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="card my-5 shadow">
            <div class="card-body">
                <img src="{{asset('storage/'.$plate->image_url)}}" alt="{{$plate->name. '\'s image'}}"
                    class="rounded-4 shadow">
                <h5 class="card-title py-3">{{$plate->name}}</h5>
                <p class="card-text">{{$plate->description}}</p>
            </div>
        </div>
    </div>
</main>
@endsection