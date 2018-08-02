<?php

namespace App\Http\Controllers\SuperieurAuth;

use App\Client;
use App\Employe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Input;

class EmployeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    public function add(Request $request)
    {

        Auth::guard('employe');

        $inputs['nom']= e(Input::get('username'));
        $inputs['prenom']= e(Input::get('prenom'));
        $inputs['password']= e(Input::get('password'));
        $inputs['datenaiss']= e(Input::get('datedebut'));
        $inputs['email']=e(Input::get('email'));
        $inputs['age']=e(Input::get('age'));
        $code = rand(1,10000);
        $idsuperieur =  auth()->user()->id;



        $Employe = Employe::create([
            'code' => $code,
            'nom'=> $inputs['nom'],
            'prenom'=>$inputs['prenom'],
            'password'=>Hash::make('password'),
            'datenaiss'=> $inputs['datenaiss'],
            'email'=>$inputs['email'],
            'age'=>$inputs['age'],
            'superieurs_id'=> $idsuperieur,
        ]);


        $Employe->save();



        return view('superieur.contenu.initiale');

    }

    public function show(){

        $client = Client::all();
        return view('superieur.contenu.listeclient',compact('client'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('superieur');
    }
}
