@extends('layouts.app')

@section('scss')
@vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
<div class="container">
    @include('partials.go-back-btn')
    <h1 class="turquoise text-center my-5">THIS PAGE IS NOT FOUND</h1>
</div>
@endsection