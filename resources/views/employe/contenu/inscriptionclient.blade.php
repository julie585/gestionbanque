@extends('acceuilemp')

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




@stop
@section('title')

    <!--<div class="a">
        <h2>
            Nouvelle cotisation Etape 2 : Enregistrement de la cotisation
        </h2>
    </div>-->
    <div class="panel panel-heading">
       <strong>INSCRIPTION CLIENT</strong>

    </div>

@stop

@section('table')



    <div class="body">




        <form role="form" method="POST" action="{{ url('/employe/addclient') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <legend >
                <STRONG> COMPTE CLIENT </STRONG>
            </legend>
            <div class="col-md-12">
                <div class="col-md-4">
                    <label for="nom">Nom du Client</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur" value="{{ old('username') }}" required onkeypress="return valid_text(event);">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nom">Mot de passe</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nom">Confirmation mot de passe</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirmer votre mot de passe" value="{{ old('conf_password') }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <legend >
                <STRONG> INFORMATIONS PERSONNELLES </STRONG>
            </legend>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Nom</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" value="{{ old('nom') }}" required onkeypress="return valid_text(event);">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <div class="demo-masked-input">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control email" id="email" name="email" placeholder="Ex: example@example.com" required value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Prénom</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre Prénom " value="{{ old('prenom') }}" required onkeypress="return valid_text(event);">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="tel">Age</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" id="age" name="age" placeholder="Ex: 25" onkeypress="return valid_number(event);" required value="{{ old('bp') }}">
                        </div>
                    </div>
                </div>
            </div>


            <div class="body">

                    <br>
                    <div class="row clearfix">
                        <legend > <STRONG> INFO
                                RMATIONS FINANCIERES </STRONG></legend>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <b>Revenus</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="montant" name="montant" placeholder="Ex: 99,99 FCFA" onkeypress="return valid_number(event);" required value="{{ old('montant') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <b>Secteur d'activité</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="type" name="type" placeholder="Votre boulot" value="{{ old('nom') }}" required onkeypress="return valid_text(event);">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <b>Date de Naissance</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="date" class="form-control date" name="datedebut" id="datedebut" placeholder="Ex: 30/07/2016" required value="{{ old('datedebut') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="button-demo">
                                <button class="btn btn-primary waves-effect" type="submit">VALIDER
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <a class="btn bg-special waves-effect m-b-15 pull-right" role="button"  href="/employe/home">
                                RETOUR
                            </a>
                        </div>

                    </div>
                </div>


        </form>



    </div>
    </div>
    </div>
    </div>
    </div>

    </div>

@stop
@section('scripts')

    <!-- Bootstrap Colorpicker Js -->
    {!! HTML::script('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') !!}
    <!-- Dropzone Plugin Js -->
    {!! HTML::script('plugins/dropzone/dropzone.js') !!}

    <!-- Input Mask Plugin Js -->
    {!! HTML::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}

    <!-- Multi Select Plugin Js -->
    {!! HTML::script('plugins/multi-select/js/jquery.multi-select.js') !!}

    <!-- Jquery Spinner Plugin Js -->
    {!! HTML::script('plugins/jquery-spinner/js/jquery.spinner.js') !!}

    <!-- Bootstrap Tags Input Plugin Js -->
    {!! HTML::script('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}

    <!-- noUISlider Plugin Js -->
    {!! HTML::script('plugins/nouislider/nouislider.js') !!}

    <!-- Custom Js -->
    {!! HTML::script('js/pages/forms/advanced-form-elements.js') !!}

    {!! HTML::script('js/helpers.js') !!}

    {!! HTML::script('js/pages/forms/basic-form-elements.js') !!}

@stop