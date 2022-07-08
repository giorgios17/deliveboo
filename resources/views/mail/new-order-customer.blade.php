@extends('layouts.mail')
@section('content')
    <h1>{{ $data->customer_name }} grazie per l'ordine!</h1>
    <h4>Di seguito il riepilogo del tuo ordine:</h4>
    <p>Nome e cognome: {{ $data->customer_name }} {{ $data->customer_surname }} </p>
    <p>Indirizzo: {{ $data->customer_address }}</p>
    <p>Telefono: {{ $data->customer_phone }}</p>
    <p>Importo totale ordine: €{{ $data->total_price }}</p>
@endsection
