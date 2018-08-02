<?php

namespace App\Http\Controllers\SuperieurAuth;

use App\Superieur;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/superieur/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('superieur.guest');
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
            'code' => 'unique:superieurs',
            'name' => 'required|max:255|string',
            'lastname' => 'required|max:255|string',
            'email' => 'required|email|max:255|unique:superieurs',
            'password' => 'required|min:6',
            'age' =>'required|integer',
            'dob' =>'required|date',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Superieur
     */
    protected function create(array $data)
    {
        $code = rand(1000,9999);
        $email = $data['email'];

        return Superieur::create([
            'code' => rand(1000,9999),
            'nom' => $data['name'],
            'prenom' => $data['lastname'],
            'password' => bcrypt($data['password']),
            'age' => $data['age'],
            'email' => $data['email'],
            'datenaiss' => $data['dob'],

        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('inscription');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('superieur');
    }
}
