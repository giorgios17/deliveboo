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

    <div id="user_index" class="row flex-column justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            I TUOI ORDINI
        </h1>

        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="card m-3 shadow">

                    <div class="card-body row">
                        <div class="col-md-6">
                            <h4>Ordine n. {{ $order->id }}</h4>
                            <hr>
                            <p class="card-title">Nome e cognome cliente: {{ $order->customer_name }}
                                {{ $order->customer_surname }}</p>
                            <p class="card-title">Indirizzo: {{ $order->customer_address }}</p>

                            <p class="card-title">Telefono: {{ $order->customer_phone }}</p>
                            <p class="card-title">Email: {{ $order->customer_email }}</p>
                            <p class="card-title">Totale: €{{ $order->total_price }}</p>

                            @if ($order->customer_note)
                                <p class="card-title">Note: {{ $order->customer_note }}</p>
                            @else
                                <p> Non sono state inserite note </p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-md-0 mt-3">Piatti ordinati</h4>
                            <hr>
                            {{-- foreach piatti ordinati --}}
                            <div>
                                @foreach ($order->plate as $plate)
                                    <p class="card-title">{{ $plate->pivot->quantity }}x {{ $plate->name }} -
                                        €{{ $plate->pivot->quantity * $plate->price }}</p>
                                    <div class="md-0">
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach
        @else
            <h4>Non hai ancora nessun ordine.</h4>
        @endif
    </div>
    <div id="user_index" class="row justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            STATISTICHE ORDINI
        </h1>
        <div>
            <canvas id="monthsOrder" width="400" height="400"></canvas>
        </div>
        <div>
            <canvas id="monthsProfit" width="400" height="400"></canvas>
        </div>
    </div>
    <script type="text/javascript">
        let _ydata = JSON.parse('{!! json_encode($months) !!}');
        let _xdata = JSON.parse('{!! json_encode($monthsTotal) !!}');
        let _xxdata = JSON.parse('{!! json_encode($monthsProfit) !!}');
    </script>
@endsection
