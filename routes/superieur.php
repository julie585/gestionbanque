<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();
    // Client , Employés , Virement , Versement , Retrait
    $cli = \App\Client::all();
    $nbrecli = count($cli);
    $employe = \App\Employe::all();
    $nbreemp = count($employe);
    $sup = \App\Superieur::all();
    $nbresup = count($sup);
    $nbreemptotal = $nbreemp + $nbresup;
    $virement = \App\Virement::all();
    $nbrevir = count($virement);
    $versement = \App\Versement::all();
    $nbrever = count($versement);
    $retrait = \App\Retrait::all();
    $nbreret = count($retrait);



    return view('superieur.contenu.initiale',compact('nbrecli','nbreemptotal','nbreret','nbrever','nbrevir'));
})->name('home');

Route::get('/inscriptionclient', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.inscriptionclient');
})->name('home');
Route::get('/info', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.posterinfo', compact('users'));});
Route::post('/addclient', 'SuperieurAuth\ClientController@add')->name('test');

Route::post('/info', 'SuperieurAuth\InfoController@add')->name('test');

Route::post('/addemploye', 'SuperieurAuth\EmployeController@add')->name('addemploye');

Route::post('/epargne', 'SuperieurAuth\ClientController@epargne')->name('addemploye');

Route::post('/courant', 'SuperieurAuth\ClientController@courant')->name('addemploye');

Route::post('/virement', 'SuperieurAuth\ClientController@virement')->name('addemploye');

Route::post('/consultcompte', 'SuperieurAuth\ClientController@consultercompte')->name('addemploye');

Route::post('/consultclient', 'SuperieurAuth\ClientController@consulterclient')->name('addemploye');

Route::post('/versementepargne', 'SuperieurAuth\ClientController@versementepargne')->name('addemploye');

Route::post('/retraitepargne', 'SuperieurAuth\ClientController@retraitepargne')->name('addemploye');

Route::post('/versementcourant', 'SuperieurAuth\ClientController@versementcourant')->name('addemploye');

Route::post('/retraitcourant', 'SuperieurAuth\ClientController@retraitcourant')->name('addemploye');

Route::post('/comptecree/{id}', 'SuperieurAuth\ClientController@creationcompte')->name('addemploye');

Route::post('/comptecreeemp/{id}', 'SuperieurAuth\ClientController@creationcompteemp')->name('addemploye');

Route::post('/getoperation/{id}', 'SuperieurAuth\ClientController@listoperation')->name('addemploye');

Route::post('/getoperationsup/{id}', 'SuperieurAuth\ClientController@listoperationsup')->name('addemploye');

Route::post('/delete/{id}', 'SuperieurAuth\ClientController@delete')->name('addemploye');

Route::get('/update/{id}', 'SuperieurAuth\ClientController@update')->name('update');

Route::post('/modify/{id}', 'SuperieurAuth\ClientController@updatecli')->name('update');

Route::post('/modifier/{id}', 'SuperieurAuth\ClientController@updatesup')->name('update');

Route::get('/listeclient', 'SuperieurAuth\ClientController@show')->name('addclient');

Route::get('/liste', 'SuperieurAuth\InfoController@show')->name('addclient');

Route::get('/listeemployes', 'SuperieurAuth\ClientController@showemploye')->name('addclient');






Route::get('/creation', 'SuperieurAuth\ClientController@compte')->name('addclient');

Route::get('/addemploye', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.inscriptionemploye');
})->name('home');

Route::get('/ecran', function () {
    $fichier = \Illuminate\Support\Facades\Input::get('fichier');
    $val = \Illuminate\Support\Facades\Input::get('val');
    $param = \Illuminate\Support\Facades\Input::get('param');

    return view($fichier, array('val' => $val, 'param' => $param));
});

Route::get('/versement', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.versement');
})->name('home');

Route::get('/retrait', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.retrait');
})->name('home');

Route::get('/virement', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.virement');
})->name('home');

Route::get('/modifcompte', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.modif');
})->name('home');



Route::get('/compte', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    //dd($users);

    return view('superieur.contenu.compteview');
})->name('home');

Route::get('/consultclient', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superieur')->user();

    $nomclient = \Illuminate\Support\Facades\DB::table('client')
                ->select('id','nom')
                ->get();

    return view('superieur.consultation.listeclient',compact('nomclient'));
})->name('home');

//Route::get('select2-autocomplete-ajax', 'ClientController@dataAjax');

//Route::get('select2-autocomplete-ajaxprenom', 'ClientController@dataAjaxprenom');

