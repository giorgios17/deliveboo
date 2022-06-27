@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            {{-- token --}}
                            @csrf

                            {{-- box alert campi obbligatori --}}
                            <div class="alert alert-warning" role="alert">
                                I campi contrassegnati dall'asterisco (*) sono obbligatori.
                            </div>

                            {{-- input business name --}}
                            <div class="form-group row">
                                <label for="business_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="business_name" type="text"
                                        class="form-control @error('business_name') is-invalid @enderror"
                                        name="business_name" value="{{ old('business_name') }}" required
                                        autocomplete="business_name" placeholder="Inserisci il nome del tuo ristorante"
                                        autofocus>
                                    @error('business_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input email --}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Inserisci la mail">
                                    <small>Inserisci una mail valida</small>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input password --}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="new-password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" minlength="8"
                                        placeholder="Conferma la password">
                                    <small>Minimo 8 caratteri</small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input conferma password --}}
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right"
                                    minlength="8">{{ __('Confirm Password') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="password-confirm"
                                        placeholder="Reinserisci la password">
                                    <small>Assicurati che le password coincidano</small>
                                </div>
                            </div>

                            {{-- input indirizzo --}}
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address"
                                        placeholder="Inserisci l'indirizzo">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input partita iva --}}
                            <div class="form-group row">
                                <label for="vat_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="vat_number" type="text"
                                        class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" required minlength="11" maxlength="11"
                                        autocomplete="vat_number" placeholder="Inserisci la Partita IVA">
                                    <small>La partita IVA deve essere di 11 cifre</small>
                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input descrizione --}}
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        @error('description') is-invalid @enderror name="description" required autocomplete="description" minlength="10"
                                        placeholder="Inserisci la descrizione">{{ old('description') }}</textarea>
                                    <small>Minimo 10 caratteri</small>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input telefono --}}
                            <div class="form-group row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" pattern="[0-9]{10}"
                                        placeholder="Inserisci il numero di telefono">
                                    <small>Formato 0817384022</small>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input orario di apertura --}}
                            <div class="form-group row">
                                <label for="opening_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Orario di apertura') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="opening_time" type="time"
                                        class="form-control @error('opening_time') is-invalid @enderror"
                                        name="opening_time" value="{{ old('opening_time') }}" required
                                        autocomplete="opening_time">
                                    <small>Formato HH:MM</small>
                                    @error('opening_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input orario di chiusura --}}
                            <div class="form-group row">
                                <label for="closing_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Orario di chiusura') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="closing_time" type="time"
                                        class="form-control @error('closing_time') is-invalid @enderror"
                                        name="closing_time" value="{{ old('closing_time') }}" required
                                        autocomplete="closing_time">
                                    <small>Formato HH:MM</small>
                                    @error('closing_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- select giorno di chiusura --}}
                            <div class="form-group row">
                                <label for="closing_day"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Giorno di chiusura') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <select class="form-control @error('closing_day') is-invalid @enderror"
                                        name="closing_day" required autocomplete="closing_day">
                                        @foreach ($days as $day)
                                            <option value="{{ $day }}"
                                                {{ $day == old('closing_day') ? 'selected' : '' }}>{{ $day }}
                                            </option>
                                        @endforeach
                                        @error('closing_day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            {{-- input costo di spedizione --}}
                            <div class="form-group row">
                                <label for="shipping_price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Costo di spedizione') }}
                                    <span class="text-warning">*</span></label>
                                <div class="col-md-6">
                                    <input id="shipping_price" type="number" min="0" step=".01"
                                        class="form-control @error('shipping_price') is-invalid @enderror"
                                        name="shipping_price" value="{{ old('shipping_price') }}" required
                                        autocomplete="shipping_price" placeholder="10.00">
                                    @error('shipping_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- checkbox tipologie --}}
                            <div class="form-group row">
                                <p class="col-md-4 col-form-label text-md-right">Tipologia ristorante <span
                                        class="text-warning">*</span></p>
                                <div class="offset-md-8"></div>
                                @foreach ($typologies as $typology)
                                    <div class="offset-md-4 col-md-8">
                                        <input type="checkbox" name="typologies[]"
                                            value="{{ $typology->id }} required"
                                            {{ in_array($typology->id, old('typologies', [])) ? 'checked' : '' }} />
                                        <label> {{ $typology->name }}</label>
                                    </div>
                                @endforeach
                                @error('typologies')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- input immagine --}}
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
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
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
