<?php
/*session_start();
if(empty($_SESSION['active']))
{
  header('Location: ../');
}*/
?>

<?php 
       $mostrarDatos_pag = new ControladorInstitucion();
       $respuesta=$mostrarDatos_pag->ctrMostrarDatos_Pag();
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="sistema escolar">
    <title><?php echo ($respuesta == "vacio")? "SISTEMA ESCOLAR":$respuesta[1]?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="vista/css/main.css">
    <link rel="shortcut icon" href="vista/images/icon/min_icon.png">

    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
    
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="inicio"><?php echo ($respuesta == "vacio")? "Vali":$respuesta[2]?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="inicio" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Herramientas</a></li>
            <li><a class="dropdown-item" href="<?php echo ($_SESSION['rol'] == 4)?"perfilAlumno":"page-user.html"?>"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="salir"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php include_once 'menu.php'?>