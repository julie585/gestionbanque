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



    {!! HTML::style('dist/css/select2.min.css') !!}







@stop

<?php

      $prenom = \Illuminate\Support\Facades\DB::table('client')
          ->where('nom' ,'=',$val)
          ->get();

 ?>




            <div>
                <label for="nom">Prénom Client</label>
                <select onchange="ecran($(this).val(),'idafficher','superieur.consultation.resultat')" class="form-control show-tick" id="prenom">
                    <option></option>
                    @foreach($prenom as $nomparame)
                        <option value="{{ $nomparame->prenom }}">{{ $nomparame->prenom }}</option>
                    @endforeach
                </select>
            </div>
















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
        $("#prenom").select2({
            placeholder:'Veuillez choisir',
            allowClear:true
        });
    </script>

    <script type="text/javascript">

        $('.keyword').superieur / consultation / prenomclient({
            placeholder: 'rechercher un client',
            ajax: {
                url: '/superieur/select2-autocomplete-ajaxprenom',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.prenom,

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