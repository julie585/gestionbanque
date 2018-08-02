<?php

namespace App\Http\Controllers\SuperieurAuth;

use App\Client;
use App\Comptecourant;
use App\Compteepargne;
use App\Employe;
use App\Http\Controllers\Controller;
use App\Information;
use App\Retrait;
use App\Superieur;
use App\Versement;
use App\Virement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;



class InfoController extends Controller
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

    public function add(){

        $inputs['nom']= e(Input::get('nom'));
        $inputs['prenom']= e(Input::get('solde'));
        $clientadd = Information::create([
            'nom'=> $inputs['nom'],
            'inf'=>$inputs['prenom'],
        ]);
        $clientadd->save();
        return \redirect('superieur/home');

    }

    public function show(){
        $liste = Information::all();
        return view('superieur.consultation.listeinfo',compact('liste'));

    }

}
