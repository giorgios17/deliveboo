@extends('layouts.dashboard')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 restaurant-bg">
                <div class="text-center p-2">
                    <div class="restaurant-img">
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                    </div>
                    <h2 class="mb-5">
                        {{ Auth::user()->business_name }}
                    </h2>
                    {{-- <p>
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
                    </p> --}}
                    <a class="btn btn-primary mb-3" href="/admin/plate/create">Aggiungi un piatto</a>
                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{ route('admin.plate.index') }}">Visualizza i tuoi piatti</a>
                    </div>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </div>
            <div class="col-10 plates-bg">
                <div class="row mt-5 justify-content-around">
                    <div class="col-12 text-center mb-4">
                        <h1 class="text-white">
                            I TUOI PIATTI
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
