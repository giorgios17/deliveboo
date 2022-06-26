@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Benvenuto</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ Auth::user()->business_name }}
                        hai effettuato il login!
                    </p>
                    <a href="admin/user" class="btn btn-primary">Vai alla Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
