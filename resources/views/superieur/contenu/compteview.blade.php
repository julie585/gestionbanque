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








@stop
@section('title')

    <!--<div class="a">
        <h2>
            Nouvelle cotisation Etape 2 : Enregistrement de la cotisation
        </h2>
    </div>-->
    <div class="panel panel-heading">
        <strong>Consultation d'un compte</strong>

    </div>

@stop

@section('table')

    <div class="body">
        <legend >
            <STRONG> CONSULTATION D'UN COMPTE </STRONG>
        </legend>
        <form method="POST" action="{{ url('/superieur/consultcompte') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label for="nom">Type de compte</label>
                    <select  class="form-control show-tick" name="typecompteexp">
                        <option></option>

                        <option value="epargne">Compte Epargne</option>
                        <option value="courant">Compte Courant</option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label for="nom">Numéro de compte</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" id="solde" name="solde" placeholder="Numéro du compte" required onkeypress="return valid_number(event);" >
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nom"></label>
                    <div class="form-group form-float">

                        <div class="button-demo">
                            <button class="btn btn-primary waves-effect" type="submit" >VALIDER
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="body">
        <legend >
            <STRONG> CONSULTATION DES COMPTES D'UN CLIENT </STRONG>
        </legend>
        <form method="POST" action="{{ url('/superieur/consultclient') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label for="nom">Nom du Client</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="solde" name="solde" placeholder="Nom du Client" required onkeypress="return valid_text(event);" >
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nom">Prénom du Client</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom du Client" required onkeypress="return valid_text(event);" >
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nom"></label>
                    <div class="form-group form-float">

                        <div class="button-demo">
                            <button class="btn btn-primary waves-effect" type="submit" >VALIDER
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>



    <div class="body">
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




    <script>
        function ecran(val, idvu, fichier, param) {
            var req = $.ajax({
                url: '{{URL::to('/superieur/ecran')}}',
                type: "GET",
                data: {val: val, fichier: fichier, param: param},
                dataType: "html"
            });
            req.done(function (msg) {
                $('#' + idvu).html(msg);
            });
        }
    </script>


@stop