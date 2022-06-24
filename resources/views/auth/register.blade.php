@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="business_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="business_name" type="text"
                                        class="form-control @error('business_name') is-invalid @enderror"
                                        name="business_name" value="{{ old('business_name') }}" required
                                        autocomplete="business_name" autofocus>

                                    @error('business_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vat_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="vat_number" type="text"
                                        class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        @error('description') is-invalid @enderror name="description" value="{{ old('description') }}" required
                                        autocomplete="description" autofocus></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opening_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Orario di apertura') }}</label>

                                <div class="col-md-6">
                                    <input id="opening_time" type="time"
                                        class="form-control @error('opening_time') is-invalid @enderror"
                                        name="opening_time" value="{{ old('opening_time') }}" required
                                        autocomplete="opening_time" autofocus>

                                    @error('opening_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="closing_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Orario di chiusura') }}</label>

                                <div class="col-md-6">
                                    <input id="closing_time" type="time"
                                        class="form-control @error('closing_time') is-invalid @enderror"
                                        name="closing_time" value="{{ old('closing_time') }}" required
                                        autocomplete="closing_time" autofocus>

                                    @error('closing_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="closing_day"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Giorno di chiusura') }}</label>

                                <div class="col-md-6">
                                    <input id="closing_day" type="text"
                                        class="form-control @error('closing_day') is-invalid @enderror" name="closing_day"
                                        value="{{ old('closing_day') }}" required autocomplete="closing_day" autofocus>

                                    @error('closing_day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <select class="form-control" name="free_shipping">
                                <option hidden>Spedizione gratuita</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>


                            <div class="form-group row mt-3">
                                <label for="shipping_price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Costo di spedizione') }}</label>

                                <div class="col-md-6">
                                    <input id="shipping_price" type="number" min="0" step=".01"
                                        class="form-control @error('shipping_price') is-invalid @enderror"
                                        name="shipping_price" value="{{ old('shipping_price') }}" required
                                        autocomplete="shipping_price" autofocus>

                                    @error('shipping_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- checkbox tipologie --}}
                            <p>Tipologia ristorante</p>
                            @foreach ($typologies as $typology)
                                <div>
                                    <input type="checkbox" name="typologies[]" value="{{ $typology->id }}"
                                        {{ in_array($typology->id, old('typologies', [])) ? 'checked' : '' }} />
                                    <label> {{ $typology->name }}</label>
                                </div>
                            @endforeach
                            @error('typologies')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group mt-5">
                                <label for="image">Immagine ristorante</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
