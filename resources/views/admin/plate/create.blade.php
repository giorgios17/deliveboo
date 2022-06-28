@extends('layouts.app')

@section('content')
    <div id="plate_create" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nuovo piatto') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.plate.store') }}" enctype="multipart/form-data">
                            {{-- token --}}
                            @csrf

                            {{-- box alert campi obbligatori --}}
                            <div class="alert alert-warning" role="alert">
                                I campi contrassegnati dall'asterisco (*) sono obbligatori.
                            </div>

                            {{-- input nome piatto --}}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome piatto') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="Inserisci il nome del piatto" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input descrizione piatto --}}
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        @error('description') is-invalid @enderror name="description" required autocomplete="description" minlength="10"
                                        placeholder="Inserisci la descrizione del piatto">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input prezzo piatto --}}
                            <div class="form-group row mt-3">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="price" type="number" min="0.1" step=".01"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price" placeholder="10.00">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- select visibilità piatto --}}
                            <div class="form-group row">
                                <label for="visible" class="col-md-4 col-form-label text-md-right">{{ __('Visibile') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <select class="form-control @error('closing_day') is-invalid @enderror" name="visible"
                                        required autocomplete="visible">
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                        @error('visible')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            {{-- input immagine piatto --}}
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine ristorante') }}
                                    <span class="text-warning">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="image" required>
                                </div>
                            </div>

                            {{-- bottone di submit dati --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crea piatto') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
