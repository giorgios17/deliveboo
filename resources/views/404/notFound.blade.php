@extends('layouts.appAdmin')
@section('content')
    <div id="not_found" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('404 Not Found') }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{-- box alert pagina non trovata --}}
                        <div class="alert alert-danger" role="alert">
                            La pagina che stai cercando non esiste.
                        </div>
                        </p>
                        <a href="admin/user" class="btn btn-danger">Torna alla Home</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
