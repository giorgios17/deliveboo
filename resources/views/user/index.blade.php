@extends('layouts.app')
@section('content')
    <div id="user_index" class="row justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            I TUOI PIATTI
        </h1>
        @if ($plates->count() > 0)
            @foreach ($plates as $plate)
                <div class="card m-3 shadow" style="width: 18rem;">
                    <div class="wrapper_img p-3">
                        <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top h-100 w-100"
                            alt="{{ $plate->name }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $plate->name }}</h4>
                        <p class="card-text">{{ $plate->description }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h4>Non hai ancora aggiunto nessun piatto.</h4>
        @endif

    </div>

    <div id="user_index" class=" justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            I TUOI ORDINI
        </h1>

        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="card m-3 shadow">

                    <div class="card-body row">
                        <div class="col-md-6">
                            <h4>Ordine n. {{ $order->id }}</h4>
                            <p class="card-title">{{ $order->customer_name }} {{ $order->customer_surname }}</p>
                            <p class="card-title">{{ $order->customer_address }}</p>

                            <p class="card-title">{{ $order->customer_phone }}</p>
                            <p class="card-title">{{ $order->customer_email }}</p>
                            <p class="card-title">Totale: €{{ $order->total_price }}</p>

                            @if ($order->customer_note)
                                <p class="card-title">Note: {{ $order->customer_note }}</p>
                            @else
                                <p> Non sono state inserite note </p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-md-0 mt-3">Piatti ordinati</h4>
                            {{-- foreach piatti ordinati --}}
                            @foreach ($order->plate as $plate)
                                <p class="card-title">n. {{ $plate->pivot->quantity }} {{ $plate->name }} </p>
                                <div class="md-0">
                                    <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top h-100 w-100"
                                        alt="{{ $plate->name }}">
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            @endforeach
        @else
            <h4>Non hai ancora nessun ordine.</h4>
        @endif



    </div>
@endsection
