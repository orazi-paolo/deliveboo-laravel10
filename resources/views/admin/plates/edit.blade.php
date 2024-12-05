@extends('admin.plates.layouts.create-or-edit')

@section('form-title')
    Updating {{ $plate->name }}
@endsection

@section('form-action')
    {{ route('admin.plates.update', $plate) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection
