@extends('layouts.app')


@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <main>
        <div class="container">
            @include('partials.go-back-btn', ['route' => 'admin.purchases.index'])
            <div class="row row-cols-1 row-cols-sm-2 my-1 g-2">
                <div class="col py-3 flex-shrink-1">
                    <div class="card p-3 d-flex flex-column justify-content-center align-items-center mx-3">
                        <h5 class="turquoise">Plates Purchased</h5>
                        <ul>
                            @foreach ($purchase->plates as $plate)
                                <li>
                                    <span class="fst-italic">
                                        {{ $plate->name }}
                                    </span>
                                    <span class="fw-bold text-wrap turquoise">x {{ $plate->pivot->quantity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col p-3">
                    <h5 class="turquoise">Purchase details</h5>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">ID:</span>
                        {{ $purchase->id }}
                    </p>
                    <p class="fw-bold">
                        <span class="fw-bold fst-italic text-wrap turquoise">Name:</span>
                        {{ strtoupper($purchase->name) }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Email:</span>
                        {{ $purchase->email }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Phone Number:</span>
                        {{ $purchase->phone_number }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Address:</span>
                        {{ $purchase->address }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">City:</span>
                        {{ $purchase->city }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Date:</span>
                        {{ date('d/m/Y H:i', strtotime($purchase->date)) }}
                    </p>
                    <p>
                        <span class="fw-bold fst-italic text-wrap turquoise">Total:</span>
                        {{ $purchase->total }} €
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
