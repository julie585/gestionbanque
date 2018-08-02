<?php

namespace App\Http\Controllers\SuperieurAuth;

use App\Client;
use App\Comptecourant;
use App\Compteepargne;
use App\Employe;
use App\Http\Controllers\Controller;
use App\Retrait;
use App\Superieur;
use App\Versement;
use App\Virement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;



class ClientController extends Controller
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



    public function add()
    {

        $inputs['nom']= e(Input::get('username'));
        $inputs['prenom']= e(Input::get('prenom'));
        $inputs['password']= e(Input::get('password'));
        $inputs['datenaiss']= e(Input::get('datedebut'));
        $inputs['type']=e(Input::get('type'));
        $inputs['email']=e(Input::get('email'));
        $inputs['age']=e(Input::get('age'));
        $inputs['revenue']=e(Input::get('montant'));
        $code = rand(1,10000);
        $idsuperieur =  auth()->user()->id;

        $clientadd = Client::create([
            'code' => $code,
            'nom'=> $inputs['nom'],
            'prenom'=>$inputs['prenom'],
            'password'=>$inputs['password'],
            'datenaiss'=> $inputs['datenaiss'],
            'type'=> $inputs['type'],
            'email'=>$inputs['email'],
            'age'=>$inputs['age'],
            'revenue'=>$inputs['revenue'],
            'superieurs_id'=> $idsuperieur,
        ]);
        $email = $inputs['email'];
        $clientadd->save();

        return redirect()->action('SuperieurAuth\ClientController@show')->with('addclient','client ajouter');
    }

    public function epargne(Request $request)
    {
        $client_id = $request->client;
        $present = DB::table('compteepargne')
                    ->where('client_id','=', $client_id)
                    ->select('id')
                    ->get();
        if(count($present) == 0){
            $inputs['solde']= e(Input::get('solde'));
            $inputs['taux']= e(Input::get('age'));
            $inputs['creation']= e(Input::get('datedebut'));
            $int = rand(1,200);
            $epargne = Compteepargne::create([
              'numero' => $int,
              'solde'=> $inputs['solde'],
              'datecreation'=>$inputs['creation'],
              'taux'=>$inputs['taux'],
              'client_id'=>  $client_id,
        ]);
            $epargne->save();
            return \redirect('superieur/creation')->with('epargne','compte épargne crée');
        }
        else{
            return back()->withInput()->with('erreurepargne','Cet Client a déja un compte épargne');
        }
    }

    public function versementepargne(Request $request)
    {
        $client_id = $request->valeur;

        $epargne_id = DB::table('compteepargne')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $numero = $request->numero;
            $inputs['montant']= e(Input::get('age'));
            $inputs['date']= e(Input::get('datedebut'));
            $versement = Versement::create([
                'numero' => $numero,
                'date'=> $inputs['date'],
                'montant'=>$inputs['montant'],
                'compteepargne_id'=>$epargne_id->id,
                'superieurs_id'=>  Auth::user()->id,
            ]);
        $compteepargne = DB::table('compteepargne')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $epargne = Compteepargne::find($compteepargne->id);
        $epargne->solde = $epargne->solde + $inputs['montant'];
        $epargne->save();
        $versement->save();
        return \redirect('superieur/versement')->with('epargne','Le Versement a été effectué');
    }

    public function creationcompte($id)
    {
        $cree = DB::table('client')
                ->where('superieurs_id','=', $id)
                ->get();
        $superieur = DB::table('superieurs')
                    ->where('id','=', $id)
                    ->first();
        return view('superieur.consultation.comptecreesup',compact('cree','superieur'));

    }

    public function creationcompteemp($id)
    {
        $cree = DB::table('client')
            ->where('employes_id','=', $id)
            ->get();
        $employe = DB::table('employes')
            ->where('id','=', $id)
            ->first();
        return view('superieur.consultation.comptecreeemp',compact('cree','employe'));

    }

    public function listoperation($id)
    {
        $versement = DB::table('versement')
            ->where('employes_id','=', $id)
            ->get();
        $retrait = DB::table('retrait')
            ->where('employes_id','=', $id)
            ->get();
        $virement = DB::table('virement')
            ->where('employe_id','=', $id)
            ->get();
        $employe = DB::table('employes')
            ->where('id','=', $id)
            ->first();
        return view('superieur.consultation.operation',compact('virement','employe','retrait','versement'));

    }

    public function listoperationsup($id)
    {
        $versement = DB::table('versement')
            ->where('superieurs_id','=', $id)
            ->get();
        $retrait = DB::table('retrait')
            ->where('superieurs_id','=', $id)
            ->get();
        $virement = DB::table('virement')
            ->where('superieurs_id','=', $id)
            ->get();
        $employe = DB::table('superieurs')
            ->where('id','=', $id)
            ->first();
        $employeadd = DB::table('employes')
            ->where('superieurs_id','=', $id)
            ->get();
        return view('superieur.consultation.operationsup',compact('virement','employe','retrait','versement','employeadd'));

    }

    public function retraitepargne(Request $request)
    {
        $client_id = $request->valeur;

        $epargne_id = DB::table('compteepargne')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $numero = $request->numero;
        $epargne = Compteepargne::find($epargne_id->id);
        $inputs['montant']= e(Input::get('age'));
        $test = $epargne->solde - $inputs['montant'];

        if($test <= 0){
            return back()->withInput()->with('erreurepargne','Apres le retrait de cette somme votre compte sera null ce qui est impossible donc veuillez changer la somme à retirer');
        }
        else{
            $inputs['date']= e(Input::get('datedebut'));
            $retrait = Retrait::create([
                'numero' => $numero,
                'date'=> $inputs['date'],
                'montant'=>$inputs['montant'],
                'compteepargne_id'=>$epargne_id->id,
                'superieurs_id'=>  Auth::user()->id,
            ]);
            $epargne->solde = $epargne->solde - $inputs['montant'];
            $epargne->save();
            $retrait->save();
            return \redirect('superieur/retrait')->with('epargne','Le Retrait a été effectué');
        }

    }

    public function retraitcourant(Request $request)
    {
        $client_id = $request->valeur;

        $epargne_id = DB::table('comptecourant')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $numero = $request->numero;
        $epargne = Comptecourant::find($epargne_id->id);
        $inputs['montant']= e(Input::get('age'));
        $test = $epargne->solde - $inputs['montant'];

        if($test <= $epargne->decouvert ){
            return back()->withInput()->with('erreurcourant','Apres le retrait de cette somme votre compte sera en dessous de votre découvert ce qui est impossible donc veuillez changer la somme à retirer');
        }
        else{
            $inputs['date']= e(Input::get('datedebut'));
            $retrait = Retrait::create([
                'numero' => $numero,
                'date'=> $inputs['date'],
                'montant'=>$inputs['montant'],
                'compteepargne_id'=>$epargne_id->id,
                'superieurs_id'=>  Auth::user()->id,
            ]);
            $epargne->solde = $epargne->solde - $inputs['montant'];
            $epargne->save();
            $retrait->save();
            return \redirect('superieur/retrait')->with('courant','Le Retrait a été effectué');
        }

    }

    public function versementcourant(Request $request)
    {
        $client_id = $request->valeur;
        $epargne_id = DB::table('comptecourant')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $numero = $request->numero;
        $inputs['montant']= e(Input::get('age'));
        $inputs['date']= e(Input::get('datedebut'));
        $versement = Versement::create([
            'numero' => $numero,
            'date'=> $inputs['date'],
            'montant'=>$inputs['montant'],
            'compteepargne_id'=>$epargne_id->id,
            'superieurs_id'=>  Auth::user()->id,
        ]);
        $compteepargne = DB::table('comptecourant')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $epargne = Comptecourant::find($compteepargne->id);
        $epargne->solde = $epargne->solde + $inputs['montant'];
        $epargne->save();
        $versement->save();
        return \redirect('superieur/versement')->with('courant','Le Versement a été effectué');
    }

    public function courant(Request $request)
    {
        $client_id = $request->client;
        $present = DB::table('comptecourant')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->get();
        if(count($present) == 0){
            $inputs['solde']= e(Input::get('solde'));
            $inputs['decouvert']= e(Input::get('age'));
            $inputs['creation']= e(Input::get('datedebut'));
            $int = rand(1,200);
            $courant = Comptecourant::create([
                'numero' => $int,
                'solde'=> $inputs['solde'],
                'datecreation'=>$inputs['creation'],
                'decouvert'=>$inputs['decouvert'],
                'client_id'=>  $client_id,
            ]);

            $courant->save();
            //return view('superieur.contenu.initiale');
            return \redirect('superieur/creation')->with('courant','compte courant   crée');
        }
        else{
            return \redirect('superieur/creation')->with('erreurcourant','Cet Client a deja un compte Courant');
        }
    }

    public function virement(Request $request)
    {
        //Donnees de l'expediteur

        $typecompte = $request->typecompteexp;
        //$typecompte retourne soit epargne soit courant
        $clientexp = $request->clientexp;
        $numeroexpediteur = $request->numero;

        //donnees du destinataire

        $typecomptedest = $request->typecomptedest;
        $clientdest = $request->clientdes;
        $numerodest = $request->numero ;
        $superieur_id  = Auth::user()->id;
        $inputs['montant']= e(Input::get('age'));

        //faire des boucles pour recuperer l'id de celui qui envoie

        if ($typecompte == "epargne"){
            $compte_id = DB::table('compteepargne')
                          ->where('client_id','=', $clientexp)
                          ->select('id','solde')
                          ->first();
            $compteexpepargne = Compteepargne::find($compte_id->id);
            if ($typecomptedest == "epargne"){
                $comptedest_id = DB::table('compteepargne')
                    ->where('client_id','=', $clientexp)
                    ->select('id','solde')
                    ->first();
                $comptedestepargne = Compteepargne::find($comptedest_id->id);
                $compteexpepargne->solde = $compteexpepargne->solde - $inputs['montant'];
                $comptedestepargne->solde = $comptedestepargne->solde + $inputs['montant'];
                $comptedestepargne->save();
                $compteexpepargne->save();
                $virement = Virement::create([
                    'numero_send'=> $numeroexpediteur,
                    'numero_dest'=> $numerodest,
                    'client_sendid'=>$clientexp,
                    'client_destid'=>$clientdest,
                    'montant'=> $inputs['montant'],
                    'epargne_sendid'=> $compteexpepargne->id,
                    'epargne_destid'=> $comptedestepargne->id,
                    'courant_sendid'=> null,
                    'courant_destid'=>null,
                    'superieurs_id' => $superieur_id,

                ]);
            }
            if ($typecomptedest == "courant"){
                $comptedest_id = DB::table('comptecourant')
                    ->where('client_id','=', $clientexp)
                    ->select('id','solde')
                    ->first();
                $comptedestcourant = Comptecourant::find($comptedest_id->id);
                $compteexpepargne->solde = $compteexpepargne->solde - $inputs['montant'];
                $comptedestcourant->solde = $comptedestcourant->solde + $inputs['montant'];
                $comptedestcourant->save();
                $compteexpepargne->save();
                $virement = Virement::create([
                    'numero_send'=> $numeroexpediteur,
                    'numero_dest'=> $numerodest,
                    'client_sendid'=>$clientexp,
                    'client_destid'=>$clientdest,
                    'montant'=> $inputs['montant'],
                    'epargne_sendid'=> $compteexpepargne->id,
                    'epargne_destid'=> null,
                    'courant_sendid'=> null,
                    'courant_destid'=>$comptedestcourant->id,
                    'superieurs_id' => $superieur_id,

                ]);
            }
        }
        if ($typecompte == "courant"){
            $compte_id = DB::table('comptecourant')
                ->where('client_id','=', $clientexp)
                ->select('id','solde')
                ->first();
            $compteexpcourant = Comptecourant::find($compte_id->id);
            if ($typecomptedest == "epargne"){
                $comptedest_id = DB::table('compteepargne')
                    ->where('client_id','=', $clientexp)
                    ->select('id','solde')
                    ->first();
                $comptedestepargne = Compteepargne::find($comptedest_id->id);
                $compteexpcourant->solde = $compteexpcourant->solde - $inputs['montant'];
                $comptedestepargne->solde = $comptedestepargne->solde + $inputs['montant'];
                $comptedestepargne->save();
                $compteexpcourant->save();
                $virement = Virement::create([
                    'numero_send'=> $numeroexpediteur,
                    'numero_dest'=> $numerodest,
                    'client_sendid'=>$clientexp,
                    'client_destid'=>$clientdest,
                    'montant'=> $inputs['montant'],
                    'epargne_sendid'=> null,
                    'epargne_destid'=> $comptedestepargne->id,
                    'courant_sendid'=> $compteexpcourant->id,
                    'courant_destid'=>null,
                    'superieurs_id' => $superieur_id,

                ]);
            }
            if ($typecomptedest == "courant"){
                $comptedest_id = DB::table('comptecourant')
                    ->where('client_id','=', $clientexp)
                    ->select('id','solde')
                    ->first();
                $comptedestcourant = Comptecourant::find($comptedest_id->id);
                $compteexpcourant->solde = $compteexpcourant->solde - $inputs['montant'];
                $comptedestcourant->solde = $comptedestcourant->solde + $inputs['montant'];
                $comptedestcourant->save();
                $compteexpcourant->save();
                $virement = Virement::create([
                    'numero_send'=> $numeroexpediteur,
                    'numero_dest'=> $numerodest,
                    'client_sendid'=>$clientexp,
                    'client_destid'=>$clientdest,
                    'montant'=> $inputs['montant'],
                    'epargne_sendid'=> null,
                    'epargne_destid'=> null,
                    'courant_sendid'=> $compteexpcourant->id,
                    'courant_destid'=>$comptedestcourant->id,
                    'superieurs_id' => $superieur_id,

                ]);
            }
        }
        $virement->save();
        return \redirect('superieur/virement')->with('epargne','Le virement a été effectué');
    }

    public function consultercompte(Request $request)
    {
        $typecompte = $request->typecompteexp;
        if($typecompte == 'courant'){
            $numero = e(Input::get('solde'));
            $compte = DB::table('comptecourant')
                ->where('numero', '=', $numero)
                ->join('client','comptecourant.client_id','=','client.id')
                ->get();
        }
        if($typecompte == 'epargne'){
            $numero = e(Input::get('solde'));
            $compte = DB::table('compteepargne')
                ->where('numero', '=', $numero)
                ->join('client','compteepargne.client_id','=','client.id')
                ->get();
        }


        return view('superieur.consultation.consultcompte', compact('compte','typecompte'));
    }

    public function consulterclient(Request $request)
    {
        $client_id = DB::table('client')
            ->where('nom', '=', $request->solde)
            ->where('prenom', '=', $request->prenom)
            ->select('id','nom','prenom')
            ->first();

            $comptecourant = DB::table('comptecourant')
                ->where('client_id', '=', $client_id->id)
                ->get();

            $compteepargne = DB::table('compteepargne')
                ->where('client_id', '=', $client_id->id)
                ->get();
        return view('superieur.consultation.consultclient', compact('comptecourant','compteepargne','client_id'));
    }

    public function show(){

        $client = Client::all();
        return view('superieur.contenu.listeclient',compact('client'));
    }


    public function showemploye(){

        $employe = Employe::all();
        $superieur = Superieur::all();
        return view('superieur.consultation.listeemploye',compact('employe','superieur'));
    }

    public function dataAjax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("client")
                ->select("id", "nom")
                ->where('nom', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function dataAjaxprenom(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("client")
                ->select("id", "prenom")
                ->where('prenom', 'LIKE', "%$search%")
                ->get();
        }
        dd($data);

        return response()->json($data);
    }


    public function delete($id){


        $Supclient = Client::destroy($id);
        $client = Client::all();
        return redirect()->action('SuperieurAuth\ClientController@show')->with('supclient','client Suprimer');
    }

    public function update($id)
    {
        $client = Client::find($id);
        return view('superieur.contenu.updateclient',compact('client'));
    }


    public function compte()
    {
        //$client = Client::find($id);
        return view('superieur.contenu.compte');
    }
    public function updatecli($id)
    {
        $client = Client::find($id);
        $inputs['nom']= e(Input::get('username'));
        $inputs['prenom']= e(Input::get('prenom'));
        $inputs['password']= e(Input::get('password'));
        $inputs['datenaiss']= e(Input::get('datedebut'));
        $inputs['type']=e(Input::get('type'));
        $inputs['email']=e(Input::get('email'));
        $inputs['age']=e(Input::get('age'));
        $inputs['revenue']=e(Input::get('montant'));
        $idsuperieur =  auth()->user()->id;
        $inputs['code']=e(Input::get('code'));

        $client->code = $inputs['code'];
        $client->nom = $inputs['nom'];
        $client->prenom = $inputs['prenom'];
        $client->password = $inputs['password'];
        $client->datenaiss = $inputs['datenaiss'];
        $client->type = $inputs['type'];
        $client->email = $inputs['email'];
        $client->age = $inputs['age'];
        $client->revenue = $inputs['revenue'];
        $client->superieurs_id = $idsuperieur;
        $client->save();
        //return view('superieur.contenu.initiale');
        return redirect()->action('SuperieurAuth\ClientController@show')->with('storeclient','Les Données du Client ont été modifier');
    }

    public function updatesup($id)
    {
        $sup = Superieur::find($id);
        $inputs['nom']= e(Input::get('username'));
        $inputs['prenom']= e(Input::get('prenom'));
        $inputs['password']= e(Input::get('password'));
        $inputs['email']=e(Input::get('email'));
        $inputs['code']=e(Input::get('code'));

        $sup->code = $inputs['code'];
        $sup->nom = $inputs['nom'];
        $sup->prenom = $inputs['prenom'];
        $sup->password = bcrypt($inputs['password']) ;
        $sup->email = $inputs['email'];
        $sup->save();

        return \redirect('superieur/modifcompte')->with('epargne','La modification a été validé');
    }


    /**
     * Get the guard to be used during authentication.
     *     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('superieur');
    }


}
