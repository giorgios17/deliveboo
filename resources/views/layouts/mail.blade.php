<div style="margin:0; padding:0; max-width: 960px; margin:auto;font-family:georgia,garamond,serif;font-size:16px;">
    {{-- header email --}}
    <div style="text-align:center; background-color:#FCBF49; padding: 10px 0px">
        <a href="http://127.0.0.1:8000">
            <img style="width: 180px" src="{{ asset('images/deliveboo-logo-blue.png') }}" alt="logo-email">
        </a>
    </div>
    @yield('content')
    {{-- footer mail --}}
    <div style="background-color:#003049; color:white; padding: 15px 0px; text-align:center;">
        <h3 style="margin-bottom: 10px">Scarica la nostra app!</h3>
        <div style="margin: 10px 0px">
            <a href="https://apps.apple.com/it/app/deliveroo-consegna-di-cibo/id1001501844">
                <img style="width: 135px; margin-bottom: 10px;" src="{{ asset('images/App_Store_Badge.png') }}"
                    alt="app-store-download"></a>
            <a href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US">
                <img style="width: 150px; margin-bottom: 10px;"
                    src="{{ asset('images/Google_Play_Store_badge.png') }}" alt="google-play-download"></a>
        </div>
        <p>Per qualsiasi informazione contattaci all'indirizzo email: <a style="color: white;"
                href="mailto:support@deliveboo.com">support@deliveboo.com</a>
        </p>
    </div>
</div>
