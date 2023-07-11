 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
   <div class="app-sidebar__user">
     <img 
      class="app-sidebar__user-avatar" 
      src="vista/images/user_default.png" 
      alt="User Image" 
      style="max-height: 70px;"
      >
     <div>
       <?php
        $apellido = explode(" ", $_SESSION['apellidos']);
        ?>
       <p class="h6 m-0"><?php echo $_SESSION['nombre'] . " " . $apellido[0] ?></p>
       <p class="app-sidebar__user-designation"><?php echo $_SESSION['nombre_rol'] ?></p>
     </div>
   </div>
   <?php if( $_SESSION['rol'] != 4 && $_SESSION['rol'] != 3)
    {?>
    <ul class="app-menu">
      <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
      
      <li class="treeview <?php echo ($_GET['ruta'] == "alumnos" || $_GET['ruta'] == "profesores" || $_GET['ruta'] == "administrativos"|| $_GET['ruta'] == "directivos") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="usuarios" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "alumnos") ? "active" : "" ?>" href="alumnos"><i class="icon fas fa-user-graduate mr-1"></i> Alumnos</a></li>
          
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "administrativos") ? "active" : "" ?>" href="administrativos"><i class="fas fa-user-shield mr-1"></i> Administrativos</a></li>
          
        </ul>
      </li>
      <li class="treeview <?php echo ($_GET['ruta'] == "mniveles" || $_GET['ruta'] == "mGradosySecciones" || $_GET['ruta'] == "mCursos" || $_GET['ruta'] == "mClases"|| $_GET['ruta'] == "matricula"|| $_GET['ruta'] == "listaCursos") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Académico</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
        <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "listaCursos") ? "active" : "" ?>" href="listaCursos"><i class="icon far fa-list-alt mr-1"></i> Lista Cursos</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "matricula") ? "active" : "" ?>" href="matricula"><i class="icon fas fa-user-graduate mr-1"></i> Matrículas</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mniveles") ? "active" : "" ?>" href="mniveles"><i class="fas fa-graduation-cap"></i>Niiveles educativos</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mGradosySecciones") ? "active" : "" ?>" href="mGradosySecciones"><i class="fas fa-school mr-1"></i>Grados y secciones </a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mCursos") ? "active" : "" ?>" href="mCursos"><i class="icon fas fa-book mr-1"></i> Cursos</a></li>
          <li><a class="treeview-item pt-3 <?php echo ($_GET['ruta'] == "mClases") ? "active" : "" ?>" href="mClases"><i class="fas fa-book-open mr-1"></i>Clases</a></li>
        </ul>
      </li>
     
      
      <li class="treeview <?php echo ($_GET['ruta'] == "registrarPago"||$_GET['ruta'] =="reportes" ||$_GET['ruta'] =="configuracionCobros" ||$_GET['ruta'] =="listaDeuda")?"is-expanded":"" ?>">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-money-check-alt"></i><span class="app-menu__label">Tesorería</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2">
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="reportes")?"active":"" ?>" href="reportes"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Reportes</a></li>
              
              <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="listaDeuda")?"active":"" ?>" href="listaDeuda"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Pagos pendientes</a></li>
              <li><a class="treeview-item pt-2 a_cobros<?php echo ($_GET['ruta']=="configuracionCobros")?"active":"" ?>" href="configuracionCobros"><i class="fas fa-school mr-1"></i>Configuración de cobros</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo ($_GET['ruta'] == "confInstitucion" || $_GET['ruta'] == "confCompetencias"|| $_GET['ruta'] == "periodos"  ) ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Configuraciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta'] == "confInstitucion") ? "active" : "" ?>" href="confInstitucion"><i class="fas fa-layer-group mr-1"></i>Configurar la institución</a></li>
          <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta'] == "periodos") ? "active" : "" ?>" href="periodos"><i class="fas fa-layer-group mr-1"></i>Periodos</a></li>
        </ul>
      </li>
      <li><a class="app-menu__item" href="administrarCursos"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Administrar cursos</span></a></li>
      <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
      <li><a class="app-menu__item btn btn-danger mx-ml-2 mx-md-2 pl-md-1 mt-5" href="https://soporte.aulatic.pe/intranet-admin1" target="_blank"><i class="app-menu__icon fas fa-play"></i><span class="app-menu__label ">Tutoriales</span></a></li>
    </ul>
    <?php
    }
    ?>


   
   <?php if( $_SESSION['rol'] == 4)
   {?>
   <ul class="app-menu">
     <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
     <li class="treeview <?php echo ($_GET['ruta'] == "pagosPendientes" )?"is-expanded":"" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-money-check-alt"></i><span class="app-menu__label">Tesorería</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu ml-2">
            <li><a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="pagosPendientes")?"active":"" ?>" href="pagosPendientes"><i class="fas fa-file-invoice-dollar mr-1"></i></i>Pagos pendientes</a></li>
            
          </ul>
      </li>
     
     
     <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
     <li><a class="app-menu__item btn btn-danger mx-ml-2 mx-md-2 pl-md-1 mt-5" href="https://soporte.aulatic.pe/intranet-alumnos" target="_blank"><i class="app-menu__icon fas fa-play"></i><span class="app-menu__label ">Tutoriales</span></a></li>
   </ul>
    <?php
   }
   ?>

<?php if( $_SESSION['rol'] == 3)
   {?>
   <ul class="app-menu">
     <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
     <li class="treeview <?php echo ($_GET['ruta'] == "cursosProfesor" )?"is-expanded":"" ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fas fa-book"></i>
            <span class="app-menu__label">
              Académico
            </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
          <ul class="treeview-menu ml-2">
            <li>
              <a class="treeview-item pt-2 <?php echo ($_GET['ruta']=="cursosProfesor")?"active":"" ?>" href="cursosProfesor">
              <i class="fas fa-book-open mr-1"></i></i>
                Cursos Asignados
            </a>
            </li>
            
          </ul>
      </li>
     
     
     <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
     <li><a class="app-menu__item btn btn-danger mx-ml-2 mx-md-2 pl-md-1 mt-5" href="https://soporte.aulatic.pe/intranet-alumnos" target="_blank"><i class="app-menu__icon fas fa-play"></i><span class="app-menu__label ">Tutoriales</span></a></li>
   </ul>
    <?php
   }
   ?>

 </aside>