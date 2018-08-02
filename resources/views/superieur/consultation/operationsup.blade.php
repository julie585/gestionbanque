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
                <strong>Opération effectués Par {{$employe->nom}} {{$employe->prenom}}</strong>
            </div>
        </div>

        </br>
    </div>

    <div class="body">

        <H3>Versement</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Numero du Compte</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type de Compte</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Numero du Compte</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type de Compte</th>

                </tr>
                </tfoot>
                <tbody>
                @foreach($versement as $versement)
                    <tr>
                        <td><strong>{{$versement->numero}}</strong></td>
                        <td><strong>{{$versement->montant}}</strong></td>
                        <td>{{$versement->date}}</td>
                        <td>@if(count($versement->compteepargne_id) == 1)
                            Compte Epargne
                             @endif
                            @if(count($versement->comptecourant_id) == 1)
                                Compte Courant
                            @endif
                        </td>



                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

                <br>
        <H3>Retrait</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Numero du Compte</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type de Compte</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Numero du Compte</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type de Compte</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($retrait as $retrait)
                    <tr>
                        <td><strong>{{$retrait->numero}}</strong></td>
                        <td><strong>{{$retrait->montant}}</strong></td>
                        <td>{{$retrait->date}}</td>
                        <td>@if(count($retrait->compteepargne_id) == 1)
                                Compte Epargne
                            @endif
                            @if(count($retrait->comptecourant_id) == 1)
                                Compte Courant
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <H3>Virement</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Numero de Compte Expediteur</th>
                    <th>Numero de Compte Destinaitaire</th>
                    <th>Montant</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Numero de Compte Expediteur</th>
                    <th>Numero de Compte Destinaitaire</th>
                    <th>Montant</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($virement as $virement)
                    <tr>
                        <td><strong>{{$virement->numero_send}}</strong></td>
                        <td><strong>{{$virement->numero_dest}}</strong></td>
                        <td>{{$virement->montant}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <H3>Employés Inscrit</H3>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Age</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($employeadd as $ajout)
                    <tr>
                        <td><strong>{{$ajout->nom}}</strong></td>
                        <td><strong>{{$ajout->prenom}}</strong></td>
                        <td>{{$ajout->email}}</td>
                        <td>{{$ajout->age}}</td>

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