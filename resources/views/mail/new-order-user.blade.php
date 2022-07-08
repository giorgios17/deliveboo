@extends('layouts.mail')
@section('content')
    <h1>Hai ricevuto un nuovo ordine da {{ $data->customer_name }} {{ $data->customer_surname }}.</h1>
    <h4>Dati dell'ordine:</h4>
    <p>Nome e cognome: {{ $data->customer_name }} {{ $data->customer_surname }} </p>
    <p>Indirizzo: {{ $data->customer_address }}</p>
    <p>Telefono: {{ $data->customer_phone }}</p>
    <p>Importo totale ordine: €{{ $data->total_price }}</p>
@endsection
