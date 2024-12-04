@extends('admin.plates.layouts.create-or-edit')

@section('form-title', 'Create new plate')

@section('goback-icon')
    <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary text-decoration-none">
        <i class="bi bi-arrow-left"></i>
        Back
    </a>
@endsection

@section('form-action')
    {{ route('admin.plates.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
