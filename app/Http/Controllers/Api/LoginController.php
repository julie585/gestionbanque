<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client;


class LoginController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function login(Request $request){
        $login = \Illuminate\Support\Facades\DB::table('client')
            ->where('client.nom','=', $request->nom)
            ->where('client.password','=',$request->password)
            ->where('client.code','=',$request->code)
            ->first();
        $client = \App\Client::find($login->id);
        $success['token'] = $client->createToken($login->nom)->accessToken;
        $response = \Response::json(['success'=>$success])->setStatusCode(200, 'Success');
        return $response;


    }

    public function refresh(Request $request){

        $login = \Illuminate\Support\Facades\DB::table('client')
            ->where('client.nom','=', $request->nom)
            ->where('client.password','=',$request->password)
            ->where('client.code','=',$request->code)
            ->first();
        $client = \App\Client::find($login->id);

        $success['token'] = $client->refresh('MyApp')->createToken('MyApp')->accessToken;



        $response = \Response::json(['success'=>$success])->setStatusCode(200, 'Success');
        return $response;
    }




}
