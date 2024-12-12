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
    <h1>Statistiche degli Ordini</h1>
    <div style="width: 80%; margin: 50px auto;">
        <canvas id="ordersChart"></canvas>
    </div>
</div>
@endsection

