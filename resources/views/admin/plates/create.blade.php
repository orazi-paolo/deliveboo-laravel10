@extends('admin.plates.layouts.create-or-edit')

@section('form-title', 'Create new plate')

@section('form-action')
    {{ route('admin.plates.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
