{{ Form::model(
        $sup,[
                'method'=> $sup->id? 'PUT' : 'POST',
                'route'=>
                         $sup->id?  [ 'superieur.update', $sup->id
                 ]: 'superieur.store'
        ]

 )}}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    {{ Form::text('nom') }}
    {{ Form::text('prenom') }}

    <button type="submit">Sauvegarder</button>

{{ Form::close() }}