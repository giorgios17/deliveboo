<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Script per gli alert --}}
    <script src="{{ asset('js/alerts.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/c2f6360f22.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="layout_base">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="wrapper_logo">
                        <img class="w-100 p-2" src="{{ asset('images/deliveboo-logo-blue.svg') }}" alt="">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    {{-- <span class="navbar-toggler-icon"> <i class="fa-solid fa-bars"></i></span> --}}
                    <div class="navbar-toggler-icon d-flex align-items-center justify-content-center"> <i
                            class="fa-solid fa-bars"></i></div>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">

                                <a class="nav-link font-weight-bold" href="{{ route('login') }}"><i
                                        class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Accedi') }} </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('register') }}">
                                        <i class="fa-solid fa-pen-to-square"></i> {{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">

                                <a class="logout_anchor nav-link text-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div id="layout_base_left" class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-xl-3 restaurant_bg">
                        <div class="d-flex flex-column align-items-center">
                            <div class="restaurant_img mt-5 mb-4 d-flex justify-content-center rounded-circle">
                                <img class="w-100 rounded-circle" src="{{ asset('storage/' . Auth::user()->image) }}"
                                    alt="">
                            </div>
                            <h2 class="text-center mb-5">
                                {{ Auth::user()->business_name }}
                            </h2>
                            <a class="btn btn_dashboard mb-4" href="{{ route('admin.user.index') }}"><i
                                    class="fa-solid fa-gear"></i> Dashboard</a>
                            <a class="btn btn_dashboard mb-4" href="{{ route('admin.plate.create') }}"><i
                                    class="fa-solid fa-plus"></i> Aggiungi un
                                piatto</a>
                            <a class="btn btn_dashboard mb-4" href="{{ route('admin.plate.index') }}"><i
                                    class="fa-solid fa-magnifying-glass"></i> Gestisci i
                                tuoi piatti</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-9 right_column">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
