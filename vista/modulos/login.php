
<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="vista/images/img/favicon.png">
	<title>Intranet</title>
	<link rel="stylesheet" type="text/css" href="vista/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<!-- <img class="wave" src="img/wave.png"> -->
	<div class="cuerpo">
	<div class="container">
		<div class="logo">
			<div style="text-align: center;"><img src="vista/images/img/logo.png"></div>
			<h1 style="text-align: center;">TESLA SCHOOL</h1>
			<p style="text-align: center;">Brindamos un  servicio educativo de calidad en los niveles de inicial, primaria y secundaria
			    con el compromiso de un servicio educativo de calidad, sustentado en valores
				éticos y morales, contribuyendo al desarrollo integral de nuestros estudiantes.</p>
		</div>
		
		<div class="login-content">
			<form action="controlador/usuarios.controlador.php" method="POST">
				<img src="vista/images/img/avatar.svg">
				<h2 class="title">Bienvenid@</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input"name="username" id="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" name="password" id="password" required>
            	   </div>
            	</div>
            	<a class="link1" href="#">¿Olvidaste la contraseña?</a>
							<?php
								if(isset($_GET['ruta']) && $_GET['ruta'] != 'login-error' && $_GET['ruta'] != 'login-inactivo'){
									echo '<div style="color:red" role="alert">
									Contraseña incorrecta
								</div>';
								}

								if(isset($_GET['ruta']) && $_GET['ruta'] == 'login-error'){
									echo '<div style="color:red" role="alert">
									Hubo un error en el login
								</div>';
								}
								if(isset($_GET['ruta']) && $_GET['ruta'] == 'login-inactivo'){
									echo '<div style="color:red" role="alert">
									Usuario inactivo
								</div>';
								}
									
							?>
            	<button type="submit" class="btn">Acceder</button>
							
            </form>
        </div>
	
    </div>
    <script type="text/javascript" src="vista/js/main_login.js"></script>
	<div class="footer">
		<p>&copy; 2021 Plataforma creada por <a class="link5" href="https://educatec.cloud" rel="noopener noreferrer" target="_blank">Educatec</a></p>
	</div>
	</div>

</body>
</html>
