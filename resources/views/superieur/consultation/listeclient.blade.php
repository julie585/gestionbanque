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



    {!! HTML::style('dist/css/select2.min.css') !!}







@stop
@section('title')

    <!--<div class="a">
        <h2>
            Nouvelle cotisation Etape 2 : Enregistrement de la cotisation
        </h2>
    </div>-->
    <div class="panel panel-heading">
        <strong>Verification</strong>

    </div>

@stop

@section('table')
    <div class="body">
        <legend >
            <STRONG>COMPTE Client </STRONG>
        </legend>
        <div class="col-md-12">
            <div class="col-md-4">
                <label for="nom">Nom Client</label>
                <select onchange="ecran($(this).val(),'idlisteentite','superieur.consultation.prenomclient')" class="form-control show-tick" id="nom">
                    <option></option>
                    @foreach($nomclient as $nomparame)
                    <option value="{{ $nomparame->nom }}">{{ $nomparame->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4" id="idlisteentite">
            </div>

        </div>
    </div>
        <h3>Compte du Client</h3>
    <div class="body">



        <div >

            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Age</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Age</th>
                    <th>Email</th>

                </tr>
                </tfoot>
                <tbody>

                <tr id="idafficher">


                </tr>

                </tbody>
            </table>
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
    {!! HTML::script('dist/js/select2.min.js') !!}




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

    <script type="text/javascript">
        $("#nom").select2({
            placeholder:'Veuillez choisir',
            allowClear:true
        });
    </script>

    <script type="text/javascript">

        $('.keyword').superieur / consultation / listeclient({
            placeholder: 'rechercher un client',
            ajax: {
                url: '/superieur/select2-autocomplete-ajax',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nom,

                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    </script>



@stop