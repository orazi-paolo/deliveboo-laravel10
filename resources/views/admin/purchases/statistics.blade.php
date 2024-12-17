@extends('layouts.app')

@section('meta')
    <meta name="statistics" content='@json($statistics)'>
@endsection

@section('scss')
    @vite('resources/sass/register-login.scss')
@endsection

@section('js')
    @vite('resources/js/statistics.js')
@endsection

@section('content')
    <div class="container">
        <h1 class="turquoise">Order Statistics</h1>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 mb-4">
                <div class="col my-2">
                    <div class="card p-4 border-3 rounded-3 border-turquoise">
                        <canvas id="totalSalesChart"></canvas>
                    </div>
                </div>
                <div class="col my-2">
                    <div class="card p-4 border-3 rounded-3 border-turquoise">
                        <canvas id="ordersCountChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card p-4 border-3 rounded-3 border-turquoise">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>
    </div>
@endsection
