 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
   <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo (!empty($_SESSION['foto'])) ? $_SESSION['foto'] : "vista/images/user_default.png" ?>" alt="User Image" style="max-height: 70px;">
     <div>
       <?php
        $apellido = explode(" ", $_SESSION['apellidos']);
        ?>
       <p class="h6 m-0"><?php echo $_SESSION['nombre'] . " " . $apellido[0] ?></p>
       <p class="app-sidebar__user-designation"><?php echo $_SESSION['nombre_rol'] ?></p>
     </div>
   </div>
   <?php if( $_SESSION['rol'] != 4)
    {?>
    <ul class="app-menu">
      <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
      
      <li class="treeview <?php echo ($_GET['ruta'] == "alumnos" || $_GET['ruta'] == "profesores" || $_GET['ruta'] == "administrativos"|| $_GET['ruta'] == "directivos") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="usuarios" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "alumnos") ? "active" : "" ?>" href="alumnos"><i class="icon fas fa-user-graduate mr-1"></i> Alumnos</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "profesores") ? "active" : "" ?>" href="profesores"><i class="fas fa-chalkboard-teacher mr-1"></i> Profesores</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "administrativos") ? "active" : "" ?>" href="administrativos"><i class="fas fa-user-shield mr-1"></i> Administrativos</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "directivos") ? "active" : "" ?>" href="directivos"><i class="fas fa-user-tie mr-1"></i> Directivos</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo ($_GET['ruta'] == "mniveles" || $_GET['ruta'] == "mGradosySecciones" || $_GET['ruta'] == "mCursos" || $_GET['ruta'] == "mClases"|| $_GET['ruta'] == "matricula") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Académico</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "matricula") ? "active" : "" ?>" href="matricula"><i class="icon fas fa-user-graduate mr-1"></i> Matrículas</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mniveles") ? "active" : "" ?>" href="mniveles"><i class="fas fa-graduation-cap"></i>Niiveles educativos</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mGradosySecciones") ? "active" : "" ?>" href="mGradosySecciones"><i class="fas fa-school mr-1"></i>Grados y secciones </a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mCursos") ? "active" : "" ?>" href="mCursos"><i class="icon fas fa-book mr-1"></i> Cursos</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mClases") ? "active" : "" ?>" href="mClases"><i class="fas fa-book-open mr-1"></i>Clases</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo ($_GET['ruta'] == "directorio"||$_GET['ruta'] =="conferencia"||$_GET['ruta'] =="correo")?"is-expanded":"" ?>">
          <a class="app-menu__item" href="usuarios" data-toggle="treeview"><i class="app-menu__icon fa fa-commenting-o"></i><span class="app-menu__label">Comunicaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2">
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="directorio")?"active":"" ?>" href="directorio"><i class="icon fas fa-user-graduate"></i> Directorio</a></li>
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="conferencia")?"active":"" ?>" href="conferencia"><i class="fas fa-chalkboard-teacher mr-1"></i> Video conferencia</a></li>
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="correo")?"active":"" ?>" href="correo"><i class="fas fa-user-shield mr-1"></i> Correo</a></li>
            </ul>
          </li>
      <li class="treeview <?php echo ($_GET['ruta'] == "periodos" || $_GET['ruta'] == "competencias" || $_GET['ruta'] == "mCursos" || $_GET['ruta'] == "mClases") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Sistema de Calificación</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "periodos") ? "active" : "" ?>" href="periodos"><i class="fas fa-layer-group mr-1"></i>Periodos</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "competencias") ? "active" : "" ?>" href="competencias"><i class="fas fa-book-open mr-1"></i></i>Competencias</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo ($_GET['ruta'] == "pagosPendientes" ||$_GET['ruta'] =="configuracionCobros" ||$_GET['ruta'] =="listaDeuda")?"is-expanded":"" ?>">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-money-check-alt"></i><span class="app-menu__label">Tesorería</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2">
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="pagosPendientes")?"active":"" ?>" href="pagosPendientes"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Pagos pendientes - Alumnos</a></li>
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="listaDeuda")?"active":"" ?>" href="listaDeuda"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Pagos pendientes - Directivo</a></li>
              <li><a class="treeview-item pt-2 a_cobros<?php echo ($_GET['ruta']=="configuracionCobros")?"active":"" ?>" href="configuracionCobros"><i class="fas fa-school mr-1"></i>Configuración de cobros</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo ($_GET['ruta'] == "confInstitucion" ) ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Configuraciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta'] == "confInstitucion") ? "active" : "" ?>" href="confInstitucion"><i class="fas fa-layer-group mr-1"></i>Configurar la institución</a></li>
        </ul>
      </li>
      <li><a class="app-menu__item" href="administrarCursos"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Administrar cursos</span></a></li>
      <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
    </ul>
    <?php
    }
    ?>


   <?php if( $_SESSION['rol'] == 4)
   {?>
   <ul class="app-menu">
     <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
     
     
     
     <li class="treeview <?php echo ($_GET['ruta'] == "directorio"||$_GET['ruta'] =="conferencia"||$_GET['ruta'] =="correo")?"is-expanded":"" ?>">
        <a class="app-menu__item" href="usuarios" data-toggle="treeview"><i class="app-menu__icon fa fa-commenting-o"></i><span class="app-menu__label">Comunicaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu ml-2">
            <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="directorio")?"active":"" ?>" href="directorio"><i class="icon fas fa-user-graduate"></i> Directorio</a></li>
            <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="conferencia")?"active":"" ?>" href="conferencia"><i class="fas fa-chalkboard-teacher mr-1"></i> Video conferencia</a></li>
            <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="correo")?"active":"" ?>" href="correo"><i class="fas fa-user-shield mr-1"></i> Correo</a></li>
          </ul>
        </li>

     <li class="treeview <?php echo ($_GET['ruta'] == "periodos" || $_GET['ruta'] == "competencias" || $_GET['ruta'] == "mCursos" || $_GET['ruta'] == "mClases") ? "is-expanded" : "" ?>">
       <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Calificaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
       <ul class="treeview-menu ml-2">
         <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "periodos") ? "active" : "" ?>" href="periodos"><i class="fas fa-layer-group mr-1"></i>Periodos</a></li>
         <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "competencias") ? "active" : "" ?>" href="competencias"><i class="fas fa-book-open mr-1"></i></i>Competencias</a></li>
       </ul>
     </li>
     <li class="treeview <?php echo ($_GET['ruta'] == "pagosPendientes" )?"is-expanded":"" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-money-check-alt"></i><span class="app-menu__label">Tesorería</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu ml-2">
            <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="pagosPendientes")?"active":"" ?>" href="pagosPendientes"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Pagos pendientes - Alumnos</a></li>
            
          </ul>
      </li>
     
     <li><a class="app-menu__item" href="administrarCursos"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Administrar cursos</span></a></li>
     <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
   </ul>
    <?php
   }
   ?>

 </aside>