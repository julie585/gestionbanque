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
    @if(Session::has('addclient'))
        @include('partials/error', ['type' => 'info', 'message' => Session::get('addclient') ])
    @endif
    @if(Session::has('supclient'))
        @include('partials/error', ['type' => 'info', 'message' => Session::get('supclient') ])
    @endif
    @if(Session::has('storeclient'))
        @include('partials/error', ['type' => 'info', 'message' => Session::get('storeclient') ])
    @endif


    <div class="body">

        <div class="panel-primary">
            <div class="titre">
                <strong>Liste de tous les clients</strong>
            </div>
        </div>
        </br>

    </div>

    <div class="body">



            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Secteur D'activités</th>
                        <th>Revenue</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Secteur D'activités</th>
                        <th>Revenue</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($client as $client)
                        <tr>
                            <td><strong>{{ $client->nom }}</strong></td>
                            <td>{{ $client->prenom}}</td>
                            <td>{{ $client->email}}</td>
                            <td>{{ $client->type}}</td>
                            <td>{{ $client->revenue}}</td>
                            <td>
                                <form method="get" action="{{ url('/superieur/update',$id = [$client->id] ) }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id" value="{!! $client-> id  !!}">
                                    <button class="b" ><span class='glyphicon glyphicon-pencil'></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ url('/superieur/delete',$id = [$client->id] ) }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id" value="{!! $client-> id  !!}">
                                    <button class="b" onclick="return confirm('Voulez vous supprimer cet client?')" ><span class='glyphicon glyphicon-trash'></span>
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