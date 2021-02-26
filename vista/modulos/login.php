<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="vista/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inicio de sesión</title>
  </head>
  <body class="loginbg">
    
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Inicio de Sesión</h3>
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" name="ingUsuario" id="ingUsuario" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">CONTRASEÑA</label>
            <input class="form-control" type="password" name="ingPass" id="ingPass" placeholder="Contraseña">
          </div>
          <div id="messageUsuario" class="mt-1"></div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Mantener Logeado</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidó la contraseña ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container mt-5">
            <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
          </div>
          <?php
             $login = new ControladorUsuarios();
             $login -> ctrIngresoUsuario();
             ?>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
          
        </form>
      </div>
      <div class="mt-5 text-white">
        <h6>&copy; Desarrollado por : <link rel="stylesheet" href="#">Tecnologías S.A</h6>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="vista/js/jquery-3.3.1.min.js"></script>
    <script src="vista/js/popper.min.js"></script>
    <script src="vista/js/bootstrap.min.js"></script>
    <script src="vista/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="vista/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>
    
