<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/admin/newUser";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'business_name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'address' => ['required', 'string'],
                'vat_number' => ['required', 'digits:11', 'numeric'],
                'description' => ['required', 'string', 'min:10'],
                'image' => ['required', 'mimes:jpg,bmp,png,jpeg', 'max:2048'],
                'phone' => ['required', 'numeric'],
                'opening_time' => ['required', 'date_format:H:i'],
                'closing_time' => ['required', 'date_format:H:i'],
                'closing_day' => ['required', 'string'],
                'shipping_price' => ['required', 'numeric', 'between:0.00,99.99'],
                'typologies' => ['required', 'exists:typologies,id'],

            ],
            [
                'business_name.required' => 'Il campo nome ristorante non può essere vuoto.',
                'business_name.max' => 'Il nome non deve superare i 100 caratteri.',
                'email.required' => 'Il campo email non può essere vuoto.',
                'email.email' => 'Formato email non valido.',
                'email.unique' => 'Email già registrata.',
                'password.required' => 'Il campo password non può essere vuoto.',
                'password.min' => 'La password deve essere minimo 8 caratteri.',
                'password.confirmed' => 'La password di conferma non coincide.',
                'address.required' => 'Il campo indirizzo non può essere vuoto.',
                'vat_number.required' => 'Il campo P.IVA non può essere vuoto.',
                'vat_number.digits' => 'Il campo P.IVA deve avere 11 cifre.',
                'vat_number.numeric' => 'Formato P.IVA non valido.',
                'description.required' => 'Il campo descrizione non può essere vuoto.',
                'description.min' => 'Il campo descrizione deve essere minimo 10 caratteri.',
                'image.required' => 'Carica un immagine del ristorante.',
                'image.mimes' => 'Formato immagine non valida.',
                'image.max' => 'Dimensione massima consentita 2048kb.',
                'phone.required' => 'Il campo numero di telefono è obbligatorio.',
                'opening_time.required' => 'Il campo orario di apertura è obbligatorio.',
                'closing_time.required' => 'Il campo orario di chiusura è obbligatorio.',
                'closing_day.required' => 'Il campo giorno di chiusura è obbligatorio.',
                'shipping_price.required' => 'Il campo costo di spedizione è obbligatorio.',
                'shipping_price.numeric' => 'Il campo costo di spedizione deve essere un numero.',
                'shipping_price.between' => 'il campo costo di spedizione deve essere compreso tra 0.00 e 99.99.',
                'typologies.required' => 'Almeno una tipologia deve essere selezionata.',
                'typologies.exists' => 'La tipologia selezionata non esiste.'


            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $img_path = Storage::put('uploads', $data['image']);
        $user = User::create([
            'business_name' => $data['business_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'vat_number' => $data['vat_number'],
            'description' => $data['description'],
            'image' => $img_path,
            'phone' => $data['phone'],
            'opening_time' => $data['opening_time'],
            'closing_time' => $data['closing_time'],
            'closing_day' => $data['closing_day'],
            'shipping_price' => $data['shipping_price'],
            'slug' => User::generateSlug($data['business_name']),
        ]);

        $user->typology()->sync($data['typologies']);
        return $user;
    }
}
