

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

    <?php

    $numero = \Illuminate\Support\Facades\DB::table('comptecourant')
                ->where('client_id','=', $val)
                ->select('comptecourant.numero')
                ->first();

    ?>


@stop


                    <label>Numero du Compte</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <h4>{{ $numero->numero }}</h4>
                            <input type="hidden" name="numero" value="{{ $numero->numero }}">

                        </div>
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

@stop