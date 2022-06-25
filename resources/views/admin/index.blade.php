@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <div class="bg-warning p-5">
            <h2>
                Benvenuto, {{ Auth::user()->business_name }}
            </h2>
            <p>
            <h5>Indirizzo: </h5>{{ Auth::user()->address }}</p>
            <p>
            <h5>Telefono: </h5>{{ Auth::user()->phone }}</p>
            <p>
            <h5>P.IVA: </h5>{{ Auth::user()->vat_number }}</p>
            <p>
            <h5>Descrizione: </h5>{{ Auth::user()->description }}</p>
            <p>
            <h5>Orario d'apertura: </h5>{{ Auth::user()->opening_time }}</p>
            <p>
            <h5>Orario di chiusura: </h5>{{ Auth::user()->closing_time }}</p>
            <p>
            <h5>Giorno di chiusura: </h5>{{ Auth::user()->closing_day }}</p>
            <p>
            <h5>Spedizione gratuita: </h5>{{ Auth::user()->free_shipping }}</p>
            <p>
            <h5>Costo spedizione:</h5>{{ Auth::user()->shipping_price }}</p>
            <div class="mb-2">
                <a class="btn btn-primary" href="{{ route('admin.plate.create') }}">Aggiungi un piatto</a>
            </div>
            <div class="mb-2">
                <a class="btn btn-primary" href="{{ route('admin.plate.index') }}">Lista piatti</a>
            </div>

        </div>
        <div>
            <img class="w-50" src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
        </div>
    </div>
@endsection
