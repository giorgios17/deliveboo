@extends('layouts.appAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('404 Not Found') }}</div>

                    <div class="card-body">
                        <p>The page you are looking for does not exist.</p>
                    </div>
                    <a class="btn btn-primary" href="/">Torna alla Home</a>
                </div>
            </div>
        </div>
    @endsection
