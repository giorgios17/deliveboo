@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <h2>
                        Benvenuto, {{ Auth::user()->business_name }}
                    </h2>
                    <p>{{ Auth::user()->address }}</p>
                    <p>{{ Auth::user()->phone }}</p>
                    <p>{{ Auth::user()->vat_number }}</p>
                    <p>{{ Auth::user()->description }}</p>
                    <p>{{ Auth::user()->opening_time }}</p>
                    <p>{{ Auth::user()->closing_time }}</p>
                    <p>{{ Auth::user()->closing_day }}</p>
                    <p>{{ Auth::user()->free_shipping }}</p>
                    <p>{{ Auth::user()->shipping_price }}</p>
                </div>
                <div>
                    <img class="w-50" src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                </div>
                <a href="/admin/plate/create">Aggiungi un piatto</a>
            </div>
        </div>
    </div>
@endsection
