@extends('layouts.mail')
@section('content')
    <div style="padding: 20px 10px">
        <h1>Grazie per aver ordinato da noi <strong>{{ $order->customer_name }}.</strong></h1>
        <h4>Di seguito il riepilogo del tuo ordine:</h4>
        <p>Nome e cognome: <strong>{{ $order->customer_name }} {{ $order->customer_surname }}</strong> </p>
        <p>Indirizzo: <strong>{{ $order->customer_address }}</strong></p>
        <p>Telefono: <strong>{{ $order->customer_phone }}</strong></p>
        @if ($order->customer_note)
            Note: <strong>{{ $order->customer_note }}</strong>
        @endif

        <h3>Piatti ordinati:</h3>
        @foreach ($order->plate as $plate)
            <p>{{ $plate->pivot->quantity }}x {{ $plate->name }} -
                €{{ $plate->pivot->quantity * $plate->price }}
            </p>
        @endforeach
        <p>Importo totale ordine(inclusa spedizione): <strong>€{{ $order->total_price }}</strong></p>
    </div>
@endsection
