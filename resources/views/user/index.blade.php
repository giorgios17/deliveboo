@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-4 bg-warning">
                <div class=" p-5">
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
                        @if (Auth::user()->free_shipping)
                            <h5>Spedizione gratuita</h5>
                        @else
                            <p>
                            <h5>Costo spedizione:</h5>{{ Auth::user()->shipping_price }}
                        @endif
                    </p>
                    <div class="mb-2">
                        <a class="btn btn-primary" href="{{ route('admin.plate.index') }}">Lista piatti</a>
                    </div>

                </div>
                <div>
                    <img class="w-50" src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                </div>
            </div>

            <div class="col-8">
                <div class="row mt-5 justify-content-around">
                    <div class="col-12 text-center mb-4">
                        <h1>
                            LA TUA LISTA PIATTI
                        </h1>
                    </div>
                    @foreach ($plates as $plate)
                        <div class="card mr-5 mb-5" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top"
                                alt="{{ $plate->name }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $plate->name }}</h4>
                                <p class="card-text">{{ $plate->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
