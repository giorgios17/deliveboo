@extends('layouts.app')

@section('content')
    <div id="plate_edit" class="row justify-content-center pb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            MODIFICA IL TUO PIATTO
        </h1>
        <div class="col-md-10 col-lg-9 col-xl-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Modifica piatto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.plate.update', $plate->id) }}"
                        enctype="multipart/form-data">
                        {{-- token --}}
                        @csrf
                        {{-- cambio il metodo di invio dei dati in PUT --}}
                        @method('PUT')

                        {{-- box alert campi obbligatori --}}
                        <div class="alert alert-warning" role="alert">
                            I campi contrassegnati dall'asterisco (*) sono obbligatori.
                        </div>

                        {{-- input nome piatto --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome piatto') }}
                                <span class="text-warning">*</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $plate->name) }}" required autocomplete="name"
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
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}
                                <span class="text-warning">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                    rows="3" name="description" required autocomplete="description" minlength="10"
                                    placeholder="Inserisci la descrizione del piatto">{{ $plate->description }}</textarea>
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
                                    value="{{ old('price', $plate->price) }}" required autocomplete="price"
                                    placeholder="10.00">
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
                                    <option value="1" {{ $plate->visible == old('closing_day') ? 'selected' : '' }}>
                                        Si</option>
                                    <option value="0" {{ $plate->visible == old('closing_day') ? 'selected' : '' }}>
                                        No</option>
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
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    name="image">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mt-3 text-center">
                                <img class="w-50 " src="{{ asset('storage/' . $plate->image) }}">
                            </div>
                        </div>

                        {{-- bottone di submit dati --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Modifica piatto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
