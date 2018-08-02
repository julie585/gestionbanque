<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();



    $cli = \App\Client::all();
    $nbrecli = count($cli);
    $virement = \App\Virement::all();
    $nbrevir = count($virement);
    $versement = \App\Versement::all();
    $nbrever = count($versement);
    $retrait = \App\Retrait::all();
    $nbreret = count($retrait);



    return view('employe.contenu.initiale',compact('nbrecli','nbreret','nbrever','nbrevir'));
})->name('home');

Route::get('/inscriptionclient', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.inscriptionclient');
})->name('home');

Route::post('/addclient', 'EmployeAuth\EmpController@add')->name('test');

Route::get('/listeclient', 'EmployeAuth\EmpController@show')->name('addclient');

Route::post('/delete/{id}', 'EmployeAuth\EmpController@delete')->name('addemploye');

Route::get('/update/{id}', 'EmployeAuth\EmpController@update')->name('update');

Route::post('/modify/{id}', 'EmployeAuth\EmpController@updatecli')->name('update');

Route::get('/creation', 'EmployeAuth\EmpController@compte')->name('addclient');

Route::get('/ecran', function () {
    $fichier = \Illuminate\Support\Facades\Input::get('fichier');
    $val = \Illuminate\Support\Facades\Input::get('val');
    $param = \Illuminate\Support\Facades\Input::get('param');

    return view($fichier, array('val' => $val, 'param' => $param));
});

Route::get('/versement', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.versement');
})->name('home');

Route::post('/epargne', 'EmployeAuth\EmpController@epargne')->name('addemploye');

Route::post('/courant', 'EmployeAuth\EmpController@courant')->name('addemploye');

Route::post('/versementepargne', 'EmployeAuth\EmpController@versementepargne')->name('addemploye');

Route::post('/versementcourant', 'EmployeAuth\EmpController@versementcourant')->name('addemploye');

Route::get('/retrait', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.retrait');
})->name('home');

Route::post('/retraitepargne', 'EmployeAuth\EmpController@retraitepargne')->name('addemploye');
// Traité les information ci-dessous enlever les liens inutiles

Route::post('/retraitcourant', 'EmployeAuth\EmpController@retraitcourant')->name('addemploye');

Route::get('/virement', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.virement');
})->name('home');
Route::post('/virement', 'EmployeAuth\EmpController@virement')->name('addemploye');

Route::get('/modifcompte', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.modif');
})->name('home');

Route::post('/modifier/{id}', 'EmployeAuth\EmpController@updatesup')->name('update');

Route::get('/liste', 'EmployeAuth\InfoController@show')->name('addclient');

Route::post('/info', 'EmployeAuth\InfoController@add')->name('test');

Route::get('/info', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employe')->user();

    //dd($users);

    return view('employe.contenu.posterinfo', compact('users'));});