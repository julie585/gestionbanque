<?php

namespace App\Http\Controllers\EmployeAuth;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use App\Comptecourant;
use App\Compteepargne;
use App\Employe;
use App\Retrait;
use App\Superieur;
use App\Versement;
use App\Virement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


class EmpController extends Controller
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
        $idemploye =  auth()->user()->id;

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
            'employes_id'=> $idemploye,
        ]);
        $clientadd->save();
        $email = $inputs['email'];
        $clientadd->save();

        return redirect()->action('EmployeAuth\EmpController@show')->with('addclient','client ajouter');

    }

    public function show(){

        $client = Client::all();
        return view('employe.contenu.listeclient',compact('client'));
    }

    public function update($id)
    {
        $client = Client::find($id);
        return view('employe.contenu.updateclient',compact('client'));
    }
    public function delete($id){


        $Supclient = Client::destroy($id);
        return redirect()->action('EmployeAuth\EmpController@show')->with('supclient','client Suprimer');
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
        $idemploye =  auth()->user()->id;
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
        $client->employes_id = $idemploye;
        $client->save();
        return redirect()->action('EmployeAuth\EmpController@show')->with('storeclient','Les Données du Client ont été modifier');
    }

    public function compte()
    {
        //$client = Client::find($id);
        return view('employe.contenu.compte');
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
            return \redirect('employe/creation')->with('epargne','compte épargne crée');
        }
        else{
            return back()->withInput()->with('erreurepargne','Cet Client a déja un compte épargne');
        }
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
            return \redirect('employe/creation')->with('courant','compte courant   crée');
        }
        else{
            return \redirect('superieur/creation')->with('erreurcourant','Cet Client a deja un compte Courant');
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
            'employes_id'=>  Auth::user()->id,
        ]);
        $compteepargne = DB::table('compteepargne')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $epargne = Compteepargne::find($compteepargne->id);
        $epargne->solde = $epargne->solde + $inputs['montant'];
        $epargne->save();
        $versement->save();
        return \redirect('employe/versement')->with('epargne','Le Versement a été effectué');
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
            'employes_id'=>  Auth::user()->id,
        ]);
        $compteepargne = DB::table('comptecourant')
            ->where('client_id','=', $client_id)
            ->select('id')
            ->first();
        $epargne = Comptecourant::find($compteepargne->id);
        $epargne->solde = $epargne->solde + $inputs['montant'];
        $epargne->save();
        $versement->save();
        return \redirect('employe/versement')->with('courant','Le Versement a été effectué');
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
                'employes_id'=>  Auth::user()->id,
            ]);
            $epargne->solde = $epargne->solde - $inputs['montant'];
            $epargne->save();
            $retrait->save();
            return \redirect('employe/retrait')->with('epargne','Le Retrait a été effectué');
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
                'employes_id'=>  Auth::user()->id,
            ]);
            $epargne->solde = $epargne->solde - $inputs['montant'];
            $epargne->save();
            $retrait->save();
            return \redirect('employe/retrait')->with('courant','Le Retrait a été effectué');
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
                    'employe_id' => $superieur_id,

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
                    'employe_id' => $superieur_id,

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
                    'employe_id' => $superieur_id,

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
                    'employe_id' => $superieur_id,

                ]);
            }
        }
        $virement->save();
        return \redirect('employe/virement')->with('epargne','Le virement a été effectué');
    }
    public function updatesup($id)
    {
        $sup = Employe::find($id);
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

        return \redirect('employe/modifcompte')->with('epargne','La modification a été validé');
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employe');
    }
}
