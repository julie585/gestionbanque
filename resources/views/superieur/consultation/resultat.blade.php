    <?php

    $resultat = \Illuminate\Support\Facades\DB::table('client')
        ->where('prenom' ,'=',$val)
        ->first();

    ?>

    <td><strong>{{$resultat->nom}}</strong></td>
    <td><strong>{{$resultat->prenom}}</strong></td>
    <td><strong>{{$resultat->age}}</strong></td>
    <td>{{$resultat->email}}</td>
