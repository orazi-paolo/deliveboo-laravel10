@extends('admin.plates.layouts.create-or-edit')

@section('form-title', 'Create new plate')

@section('goback-icon')
<a href="{{ route('admin.plates.index') }}" class="text-decoration-none text-secondary">
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