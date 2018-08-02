<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-idth, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>GBANK:</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style type="text/css">
        .name{
            font-size: large;
        }
        .email
        {
            font-size: large;
        }
    </style>

    <!-- Google Fonts -->
{!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext') !!}
{!! HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}

<!-- Bootstrap Core Css -->
{!! HTML::style('plugins/bootstrap/css/bootstrap.css') !!}

<!-- Waves Effect Css -->
{!! HTML::style('plugins/node-waves/waves.css') !!}

<!-- Animation Css -->
{!! HTML::style('plugins/animate-css/animate.css') !!}

<!-- Morris Chart Css-->
{!! HTML::style('plugins/morrisjs/morris.css') !!}

<!-- Custom Css -->
{!! HTML::style('css/style.css') !!}

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    {!! HTML::style('css/themes/all-themes.css') !!}

    @yield('head')
</head>

<body class="theme-indigo">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Patientez s'il vous plaît...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Navigation -->
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand">GBANK</a>
        </div>
        <!-- Menu supérieur -->
        <ul class="nav navbar-right navbar-nav">
            <li><a href="employe/home"><strong> Accueil </strong></a></li>
            <li class="dropdown">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <strong>
                        <span>{{ auth()->user()->nom }}</span>
                    </strong>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/employe/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Déconnection</a>

                        <form id="logout-form" action="{{ url('/employe/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>
</div>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../images/User.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <strong>{{ auth()->user()->nom }}</strong>
                </div>
                <div class="email"><strong>{{ auth()->user()->email }}</strong></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{ url('/employe/logout') }}"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Deconnexion</a>
                            <form id="logout-form" action="{{ url('/employe/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU PRINCIPAL</li>
                <br>

                <li>
                    <a href="{{ url('/employe/home ') }}">
                        <i class="material-icons">home</i>
                        <span>Accueil</span>
                    </a>

                </li>
                <li class="special">Gestion des utilisateurs la Banque</li>
                <li class="active">
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>Clients</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/employe/listeclient ') }}">Clients</a>
                        </li>
                        <li>
                            <a href="{{ url('/employe/inscriptionclient ') }}">Inscription</a>
                        </li>

                    </ul>
                </li>
                <li class="special">Gestion des informations</li>
                <li>
                    <a href="{{ url('/employe/liste') }}">
                        <i class="material-icons">home</i>
                        <span>Liste des informations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/employe/info ') }}">
                        <i class="material-icons">home</i>
                        <span>Poster des informations</span>
                    </a>
                </li>

                <li class="special">Transactions Bancaires</li>

                <li >
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">attach_money</i>
                        <span>Transactions Bancaires</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/employe/creation ') }}">Creation du Compte</a>
                        </li>
                        <li>
                            <a href="{{ url('/employe/versement ') }}">Versement</a>
                        </li>
                        <li>
                            <a href="{{ url('/employe/retrait ') }}">Retrait</a>
                        </li>
                        <li>
                            <a href="{{ url('/employe/virement') }}">Virement</a>
                        </li>
                    </ul>
                </li>


                <li class="special">Parametrage</li>

                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Parametrage</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/employe/modifcompte') }}">MODIFICATION DU COMPTE</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 - 2018 <a href="javascript:void(0);">GBANK : Projet Mida</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">

    <div class="row clearfix">
        @yield('title')
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                @yield('table')
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Jquery Core Js -->
{!! HTML::script('plugins/jquery/jquery.min.js') !!}

<!-- Bootstrap Core Js -->
{!! HTML::script('plugins/bootstrap/js/bootstrap.js') !!}

<!-- Select Plugin Js -->
{!! HTML::script('plugins/bootstrap-select/js/bootstrap-select.js') !!}

<!-- Slimscroll Plugin Js -->
{!! HTML::script('plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

<!-- Waves Effect Plugin Js -->
{!! HTML::script('plugins/node-waves/waves.js') !!}

<!-- Jquery CountTo Plugin Js -->
{!! HTML::script('plugins/jquery-countto/jquery.countTo.js') !!}

<!-- Morris Plugin Js -->
{!! HTML::script('plugins/raphael/raphael.min.js') !!}
{!! HTML::script('plugins/morrisjs/morris.js') !!}

<!-- ChartJs -->
{!! HTML::script('plugins/chartjs/Chart.bundle.js') !!}

<!-- Flot Charts Plugin Js -->
{!! HTML::script('plugins/flot-charts/jquery.flot.js') !!}
{!! HTML::script('plugins/flot-charts/jquery.flot.resize.js') !!}
{!! HTML::script('plugins/flot-charts/jquery.flot.pie.js') !!}
{!! HTML::script('plugins/flot-charts/jquery.flot.categories.js') !!}
{!! HTML::script('plugins/flot-charts/jquery.flot.time.js') !!}

<!-- Sparkline Chart Plugin Js -->
{!! HTML::script('plugins/jquery-sparkline/jquery.sparkline.js') !!}

<!-- Custom Js -->
{!! HTML::script('js/admin.js') !!}

<!-- Demo Js -->
{!! HTML::script('js/demo.js') !!}

<!-- Bootstrap Notify Plugin Js -->
{!! HTML::script('plugins/bootstrap-notify/bootstrap-notify.js') !!}


<script>
    function ecran(val, idvu, fichier, param) {
        var req = $.ajax({
            url: '{{URL::to('ecran')}}',
            type: "GET",
            data: {val: val, fichier: fichier, param: param},
            dataType: "html"
        });
        req.done(function (msg) {
            $('#' + idvu).html(msg);
        });
    }
</script>

<!-- <script>
     $(function () {
         $('input').iCheck({
             checkboxClass: 'icheckbox_square-blue',
             radioClass: 'iradio_square-blue',
             increaseArea: '20%' // optional
         });
     });
 </script>-->


@yield('scripts')
</body>

</html>