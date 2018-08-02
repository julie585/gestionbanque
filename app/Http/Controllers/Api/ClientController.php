<?php

namespace App\Http\Controllers\Api;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Client;


class ClientController extends Controller
{

    public function solde(Request $request){

        $soldeepargne = \Illuminate\Support\Facades\DB::table('compteepargne')
            ->join('client','compteepargne.client_id','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('compteepargne.solde','compteepargne.numero')
            ->get();

	$soldecourant = \Illuminate\Support\Facades\DB::table('comptecourant')
            ->join('client','comptecourant.client_id','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('comptecourant.solde','comptecourant.numero')
            ->get();

	$solde = ['courant'=> $soldecourant, 'epargne'=> $soldeepargne];

        $response = \Response::json($solde)->setStatusCode(200, 'Success');

        return $response;

    }



    
    public function releveepargne(Request $request){
        $i = \Illuminate\Support\Facades\DB::table('compteepargne')
            ->join('client','compteepargne.client_id','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('compteepargne.id')
            ->first();

        $releve = \Illuminate\Support\Facades\DB::table('retrait')
            ->where('retrait.compteepargne_id','=', $i->id)
            ->select('retrait.montant','retrait.date')
            ->get();
        $releve2 = \Illuminate\Support\Facades\DB::table('versement')
            ->where('versement.compteepargne_id','=', $i->id)
            ->select('versement.montant','versement.date')
            ->get();
        $releve3 = \Illuminate\Support\Facades\DB::table('virement')
            ->join('client','virement.client_sendid','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('virement.montant','virement.created_at')
            ->get();

        $releve4  = \Illuminate\Support\Facades\DB::table('virement')
            ->join('client','virement.client_destid','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('virement.montant','virement.created_at')
            ->get();
        $somme = ['retrait'=> $releve, 'versement'=> $releve2 , 'virement effectué' => $releve3 , 'virement recu' => $releve4];

        $response = \Response::json($somme)->setStatusCode(200, 'Success');
        return $response;
    }

    public function relevecourant(Request $request){

        $i = \Illuminate\Support\Facades\DB::table('comptecourant')
            ->join('client','comptecourant.client_id','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('comptecourant.id')
            ->first();

        $releve = \Illuminate\Support\Facades\DB::table('retrait')
            ->where('retrait.comptecourant_id','=', $i->id)
            ->select('retrait.montant','retrait.date')
            ->get();
        $releve2 = \Illuminate\Support\Facades\DB::table('versement')
            ->where('versement.comptecourant_id','=', $i->id)
            ->select('versement.montant','versement.date')
            ->get();
        $releve3 = \Illuminate\Support\Facades\DB::table('virement')
            ->join('client','virement.client_sendid','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('virement.montant','virement.created_at')
            ->get();

        $releve4  = \Illuminate\Support\Facades\DB::table('virement')
            ->join('client','virement.client_destid','=','client.id')
            ->where('client.code','=', $request->code)
            ->select('virement.montant','virement.created_at')
            ->get();
        $somme = ['retrait'=> $releve, 'versement'=> $releve2 , 'virement effectué' => $releve3 , 'virement recu' => $releve4];
        $response = \Response::json($somme)->setStatusCode(200, 'Success');
        return $response;
    }

    public function info(){

        $info = Information::all();

        $solde = ['info'=> $info];

        $response = \Response::json($solde)->setStatusCode(200, 'Success');

        return $response;

    }




}
