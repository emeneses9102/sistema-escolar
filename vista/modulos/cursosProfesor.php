<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Listado de Cursos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Lista de cursos</a></li>
  </ul>
</div>
<div class="row" id="listCursosProfesor">
  <div class="col-md-12">
    <div class="tile">
      <h3>Clases y cursos</h3>
      <hr>
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tableCursosProfesor">
            <thead>
              <tr class="text-center">
                <th>Acciones </th>
                <th>Nombre del curso</th>
                <th>Nivel</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Total de alumnos</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = "id_profesor";
              $valor = $_SESSION['usuario_id'];
              $cursos = ControladorCursosProfesor :: ctrMostrarCursos($item,$valor);
              foreach($cursos as $value){
                
                echo'<tr>
                      <th>
                        <button class="btn btn-primary  mt-1" title="ver curso" onclick="">Ir</i></button>
                      </th>

                      <th>'.$value['curso'].'</th>
                      <th>'.$value['nivel'].'</th>
                      <th>'.$value['grado'].'</th>
                      <th>'.$value['nseccion'].'</th>
                      <th>20</th>
                      <th><span class="badge badge-primary">Activo</span></th>
                    </tr>
                ';
              }
            ?>
            </tbody>
          </table>
        </div>
       
      </div>
    </div>
  </div>
</div>