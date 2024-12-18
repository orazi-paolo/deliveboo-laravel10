@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <div class="container-fluid py-5">
        @include('partials.session-msg')
        <h2 class="mb-4 text-center turquoise border-bottom pb-2 fw-bold">Total Orders: {{ $orderCount }}</h2>
        <div class="box-buttons mb-3">
            @include('partials.go-back-btn', ['route' => 'admin.plates.index'])
            <a class="btn btn-sm btn-turquoise text-decoration-none" href="{{ route('admin.statistics.index')}}">
                    <i class="bi bi-graph-up"></i>
                    Statistics
            </a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-hover table-striped">
                {{-- Table header --}}
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Id</span></th>

                        <th scope="col">
                            <span class="turquoise">Name</span>
                        </th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Email</span></th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Phone</span></th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Address</span></th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">City</span></th>
                        <th scope="col"><span class="turquoise">Date</span></th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Total</span></th>
                        <th scope="col" class="d-none d-lg-table-cell"><span class="turquoise">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Table Body --}}
                    @forelse ($purchases as $purchase)
                        <tr>
                            {{-- Id --}}
                            <th scope="row" class="d-none d-lg-table-cell">{{ $purchase->id }}</th>
                            {{-- Name --}}
                            <td>
                                <p class="m-0">{{ $purchase->name }}</p>
                            </td>
                            {{-- Email --}}
                            <td class="d-none d-lg-table-cell">
                                <p class="m-0">
                                    {{ $purchase->email }}
                                </p>
                            </td>
                            {{-- Phone Number --}}
                            <td class="d-none d-lg-table-cell">
                                <p class="m-0">
                                    {{ $purchase->phone_number }}
                                </p>
                            </td>
                            {{-- Address --}}
                            <td class="d-none d-lg-table-cell">
                                <p class="m-0">{{ $purchase->address }}</p>
                            </td>
                            {{-- City --}}
                            <td class="d-none d-lg-table-cell">{{ $purchase->city }}</td>
                            {{-- Date --}}
                            <td>{{ date('d/m/Y H:i', strtotime($purchase->date)) }}</td>
                            {{-- Total --}}
                            <td class="d-none d-lg-table-cell">{{ $purchase->total }}&euro;</td>
                            {{-- Actions --}}
                            <td >
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.purchases.show', $purchase) }}"
                                        class="btn btn-sm btn-turquoise">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    {{-- <button class="btn btn-sm btn-turquoise" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $purchase->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button> --}}
                                    {{-- ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ Modal ⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️ --}}
                                    {{-- @include('partials.delete-modal', ['purchase' => $purchase]) --}}
                                    {{-- ⬆️⬆️⬆️⬆️⬆️⬆️ Modal ⬆️⬆️⬆️⬆️⬆️⬆️ --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <h5 class="d-flex justify-content-center fw-semibold">
                                    Purchases list is empty
                                </h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $purchases->links() }}
        </div>
    </div>
@endsection

@section('add-script')
    @vite('resources/js/plates/toast-control.js');
@endsection
