   <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gbank | Log in</title>
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->
    {!! HTML::style('templatelogin/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    <!-- Theme style -->
    {!! HTML::style('templatelogin/dist/css/AdminLTE.min.css') !!}
    <!-- iCheck -->
    {!! HTML::style('templatelogin/plugins/iCheck/square/blue.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Gbank</b>Login</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg"><strong> Connectez-vous </strong></p>

        <form action="{{ url('/superieur/login') }}" method="post">
          <div class="form-group has-feedback">
          {!! csrf_field() !!}

            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom d'utilisateur"  required />

            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          </div>
            <div class="form-group has-feedback">
                <input type="number" name="code" class="form-control" placeholder="Code de votre inscription" required />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>
          <div class="row">
            <div class="col-xs-8">
              <button type="submit" class="btn btn-primary ">Se connecter</button>

             </div>

        </form>

          <form action="{!! url('/superieur/register') !!}" method="get">


                <div class="col-lg-offset-8">
                    <button type="submit" class="btn btn-primary "   >S'inscrire</button>

                </div>

          </form>
     <!--     -->
      </div>





      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    {!! HTML::script('templatelogin/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! HTML::script('templatelogin/bootstrap/js/bootstrap.min.js') !!}
    <!-- iCheck -->
    {!! HTML::script('templatelogin/plugins/iCheck/icheck.min.js') !!}
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>