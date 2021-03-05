<?php 
session_start();
//Validamos si el usuario ha iniciado sesión
if(isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok")
	{
		require_once 'vista/modulos/header.php';
		echo '<main class="app-content">';
		//-- Contenido --
			if(isset($_GET['ruta'])){

				if($_GET['ruta'] == "inicio" ||
					$_GET['ruta'] == "matricula" ||
					$_GET['ruta'] == "usuarios" ||
					$_GET['ruta'] == "alumnos" ||
					$_GET['ruta'] == "profesores" ||
					$_GET['ruta'] == "administrativos" ||
					$_GET['ruta'] == "directivos" ||
					$_GET['ruta'] == "registrarUsuario" ||
					$_GET['ruta'] == "salir"||
					$_GET['ruta'] == "mniveles"||
					$_GET['ruta'] == "administrarCursos"||
					$_GET['ruta'] == "mGradosySecciones"||
					$_GET['ruta'] == "mCursos" ||
					$_GET['ruta'] == "mClases"||
					$_GET['ruta'] == "periodos"||
					$_GET['ruta'] == "directorio" ||
					$_GET['ruta'] == "conferencia" ||
					$_GET['ruta'] == "correo" ||
					$_GET['ruta'] == "configuracionCobros" ||
					$_GET['ruta'] == "pagosPendientes" ||
					$_GET['ruta'] == "registrarPago" ||
					$_GET['ruta'] == "listaDeuda" ||
					$_GET['ruta'] == "competencias"||
					$_GET['ruta'] == "confInstitucion"){
					include_once "vista/modulos/".$_GET['ruta'].".php";
				}
				else{
					include_once "vista/modulos/404.php";
				}
			}
			else{
				include_once "vista/modulos/inicio.php";
			}

		echo '</main>';
		require_once 'vista/modulos/footer.php';
	}
	//Si no ha iniciado es redirigido al login
else{
	require_once "vista/modulos/login.php";
}
