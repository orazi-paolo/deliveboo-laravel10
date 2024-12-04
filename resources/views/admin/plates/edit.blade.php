@extends('admin.plates.layouts.create-or-edit')

@section('form-title')
Updating {{$plate->name}}
@endsection

@section('goback-icon')
<a href="{{ route('admin.plates.index') }}" class="text-decoration-none text-secondary">
    <i class="bi bi-arrow-left"></i>
    Back
</a>
@endsection

@section('form-action')
{{ route('admin.plates.update', $plate)}}
@endsection

@section('form-method')
@method('PUT')
@endsection