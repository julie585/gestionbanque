@extends('acceuilsup')

@section('head')

    <style type="text/css" xmlns="http://www.w3.org/1999/html">
        .a {
            margin-left: 20px;
        }
        .titre{
            color: white;
            background-color: #1f91f3 !important;
            border-radius: 5px;
            font-size: medium;
        }
    </style>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Colorpicker Css -->
    {!! HTML::style('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') !!}
    <!-- Dropzone Css -->
    {!! HTML::style('plugins/dropzone/dropzone.css') !!}
    <!-- Multi Select Css -->
    {!! HTML::style('plugins/multi-select/css/multi-select.css') !!}

    <!-- Bootstrap Spinner Css -->
    {!! HTML::style('plugins/jquery-spinner/css/bootstrap-spinner.css') !!}

    <!-- Bootstrap Tagsinput Css -->
    {!! HTML::style('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}

    <!-- Bootstrap Select Css -->
    {!! HTML::style('plugins/bootstrap-select/css/bootstrap-select.css') !!}

    <!-- noUISlider Css -->
    {!! HTML::style('plugins/nouislider/nouislider.min.css') !!}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <!-- Colorpicker Css -->
    {!! HTML::style('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') !!}

    <!-- Dropzone Css -->
    {!! HTML::style('plugins/dropzone/dropzone.css') !!}

    <!-- Multi Select Css -->
    {!! HTML::style('plugins/multi-select/css/multi-select.css') !!}

    <!-- Bootstrap Spinner Css -->
    {!! HTML::style('plugins/jquery-spinner/css/bootstrap-spinner.css') !!}

    <!-- Bootstrap Tagsinput Css -->
    {!! HTML::style('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}

    <!-- Bootstrap Select Css -->
    {!! HTML::style('plugins/bootstrap-select/css/bootstrap-select.css') !!}

    <!-- noUISlider Css -->
    {!! HTML::style('plugins/nouislider/nouislider.min.css') !!}

    {!! HTML::style('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') !!}


@stop
@section('title')

    <!--<div class="a">
        <h2>
            Nouvelle cotisation Etape 2 : Enregistrement de la cotisation
        </h2>
    </div>-->
    <div class="panel panel-heading">
        <strong>BIENVENUE Mr {{ auth()->user()->nom }}</strong>

    </div>

@stop

@section('table')



    <div class="body">

        <div class="panel-primary">
            <div class="titre">
                <strong>Liste des employés</strong>
            </div>
        </div>

        </br>
    </div>

    <div class="body">

        <H3>Employés Simple</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Operation Effectué</th>
                    <th>Comptes Clients crées</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Operation Effectué</th>
                    <th>Comptes Clients crées</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($employe as $employe)
                    <tr>
                        <td><strong>{{$employe->nom}}</strong></td>
                        <td><strong>{{$employe->prenom}}</strong></td>
                        <td>{{$employe->email}}</td>
                        <td>{{$employe->age}}</td>
                        <td>
                            <form method="post" action="{{ url('/superieur/getoperation',$id = [$employe->id] ) }}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{!! $employe-> id  !!}">
                                <button class="b" ><span class='glyphicon glyphicon-eye-open'></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ url('/superieur/comptecreeemp',$id = [$employe->id] ) }}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{!! $employe-> id  !!}">
                                <button class="b" ><span class='glyphicon glyphicon-eye-open'></span>
                                </button>
                            </form>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

                <br>
        <H3>Superieur Hiérarchique</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Operation Effectué</th>
                    <th>Comptes Clients Crée</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Operation Effectué</th>
                    <th>Comptes Clients Crée</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($superieur as $superieur)
                <tr>

                    <td><strong>{{$superieur->nom}}</strong></td>
                    <td><strong>{{$superieur->prenom}}</strong></td>
                    <td>{{$superieur->email}}</td>
                    <td>{{$superieur->age}}</td>
                    <td>
                        <form method="post" action="{{ url('/superieur/getoperationsup',$id = [$superieur->id] ) }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{!! $superieur-> id  !!}">
                            <button class="b" ><span class='glyphicon glyphicon-eye-open'></span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ url('/superieur/comptecree',$id = [$superieur->id] ) }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{!! $superieur-> id  !!}">
                            <button class="b" ><span class='glyphicon glyphicon-eye-open'></span>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>




@stop
@section('scripts')

    <!-- JQuery DataTable Css -->

    <!-- Jquery DataTable Plugin Js -->
    {!! HTML::script('plugins/jquery-datatable/jquery.dataTables.js') !!}
    {!! HTML::script('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/jszip.min.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/pdfmake.min.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/vfs_fonts.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') !!}
    {!! HTML::script('plugins/jquery-datatable/extensions/export/buttons.print.min.js') !!}



@stop