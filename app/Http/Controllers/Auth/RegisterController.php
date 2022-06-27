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
    protected $redirectTo = "/admin";

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
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'vat_number' => ['required', 'digits:11'],
            'description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,bmp,png,jpeg', 'max:2048'],
            'phone' => ['required', 'string'],
            'opening_time' => ['required'],
            'closing_time' => ['required'],
            'closing_day' => ['required', 'string'],
            'shipping_price' => ['required', 'numeric', 'between:0.00,99.99'],
            'typologies[]' => ['exists:typologies,id']
        ]);
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
