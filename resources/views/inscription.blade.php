<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
{!! HTML::style('inscriptiontemplate/bootstrap.min.css') !!}
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
{!! HTML::script('inscriptiontemplate/bootstrap.min.js') !!}
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
{!! HTML::style('inscriptiontemplate/jquery-1.11.1.min.js') !!}
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Inscription du Supérieur Hiérarchique</div>
            <div class="panel-body">
                <form name="myform" action="{!! url('/superieur/register') !!}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                        <label for="name">Nom *</label>
                        <input id="name" name="name" class="form-control" type="text" required>
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Prénom *</label>
                        <input id="lastname" name="lastname" class="form-control" type="text" required>
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age *</label>
                        <input id="age" name="age"  class="form-control" type="number" min="25" required >
                        <span id="error_age" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input id="password" name="password"  class="form-control" type="text" min="8" required >
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date de naissance *</label>
                        <input type="date" name="dob" id="dob" class="form-control">
                        <span id="error_dob" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>


                    <button id="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button>

                </form>
                <form name="myform" action="{!! url('/superieur/login') !!}" method="get">
                    <button id="submit" type="submit" value="submit" class="btn btn-primary center">Retour</button>
                </form>

            </div>
        </div>
    </div>
</div>
</body>