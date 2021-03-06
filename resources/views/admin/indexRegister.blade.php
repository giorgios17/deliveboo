@extends('layouts.appAdmin')
@section('content')
    <div id="admin_indexRegister" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Benvenuto {{ Auth::user()->business_name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{-- box alert registrazione effettuata con successo --}}
                        <div class="alert alert-success" role="alert">
                            Congratulazioni {{ Auth::user()->business_name }}, la registrazione ha avuto successo.
                        </div>
                        </p>
                        <a href="/admin/user" class="btn btn_index_admin">Vai alla Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
