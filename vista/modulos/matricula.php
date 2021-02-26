<div class="app-title mb-2">
    <div>
        <h3 id="tituloAlumno"><i class="fas fa-school"></i> Matrícula </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
    </ul>
</div>
<div class="user">
    <div class="form-inline mb-2 ">
        <div class="container-button ml-auto">
            <button class="btn btn-success mr-2"><i class="fa fa-user-circle" aria-hidden="true"></i>Nuevo Alumno</button>
            <button class="btn btn-info "  data-toggle="modal" data-target="#mBuscarAlumno"><i class="fa fa-search" aria-hidden="true" ></i> Buscar Alumno</button>
        </div>
    </div>
    <div class="col-md-12 tile ">
        <h3 class="tile-title">Realizar matrícula</h3>
       <form action="" id="frmMatricula">
            <div class="row mx-md-4" id="form-matricula">
                <div class=" col-md-3 form-group">
                    <label for="">Nombres:</label>
                    <input type="text" class="form-control" name="matricula_nombre" id="matricula_nombre" readonly required>
                </div>
                <div class=" col-md-3 form-group">
                    <label for="">Apellidos:</label>
                    <input type="text" class="form-control"  name="matricula_apellidos" id="matricula_apellidos" readonly required>
                </div>
                <div class=" col-md-4 form-group">
                    <label for="">Apoderado:</label>
                    <input type="text" class="form-control"  name="matricula_apoderado" id="matricula_apoderado" readonly required>
                </div>
                <div class=" col-md-2 form-group">
                    <label for="">Código de Alumno:</label>
                    <input type="text" class="form-control"  name="matricula_codAlumno" id="matricula_codAlumno" readonly required>
                </div>
                <h5 class="col-md-12 mt-3">Agregar Alumno a grado <hr></h5>
                <div class="col-md-4 row">
                    <div class="col-md-12 form-group">
                      <?php
                      $item = null;
                      $valor = null;
                      $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                      //var_dump($mostrarNiveles);
                      ?>
                      <label for="nivel">Nivel:</label>
                      <select id="nivel" class="form-control" type="select" name="nivel" required>
                          <option value=""></option>
                          <?php foreach ($mostrarNiveles as $nivel) {     ?>
                              <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="grado">Grado:</label>
                      <select id="grado" class="form-control mgrado" type="text" name="grado" required>
                      </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="seccion">Sección:</label>
                        <select id="seccion" class="form-control" type="text" name="seccion" required></select>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <p class="h5">Detalles:</p>
                    <h6 class="text-center ">Primer grado de Primaria Sección A</h6>
                    <div class="form-group container row mt-4">
                        <label for="" class="col-md-3 mt-2 text-md-right">N° de matriculados:</label>	
                        <input type="text" class="form-control col-md-3">
                        <label for="" class="col-md-3 mt-2 text-md-right">Tutor:</label>	
                        <input type="text" class="form-control col-md-3">
                        <div class="col-md-12 mt-4 text-center">
                            <button class="btn btn-info btn-sm ">Ver Lista de Alumnos</button>
                        </div>
                    </div>
                </div>
                <div class="form-inline col-md-12">
                <button type="button" class="btn btn-primary ml-auto" id="btnRegistrarMat">Registrar</button>
                <button class="btn btn-danger ml-2" id="btnCancelarMat">Cancelar</button>
                </div>
            </div>
            
       </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mBuscarAlumno" tabindex="-1" aria-labelledby="BuscarAlumnoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BuscarAlumnoLabel">Buscar Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="matriculaAlumnos">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>Código</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Apoderado</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorAlumnos :: ctrMostrarAlumno($item,$valor);
              foreach($usuarios as $value){
                  if($value['estado']!=1){
                    continue;
                  }else{
                    
                    $apoderado = ($value['nombres_apoderado'] == "")?"-":$value['nombres_apoderado']." ".$value['apellidos_apoderado'];
                    echo'<tr>
                            
                          <td><button class="btn btn-primary btn-sm mt-1" title="Agregar" name="'.$value["idAlumno"].'" id="Mat_Alumno"><i class="fas fa-user-edit"></i></button>
                          </td> 
                          <td>'.$value["cod_matricula"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value['apellidos'].'</td>
    
                          <td>'.$value['usuario'].'</td>
                          <td >'.$apoderado.'</td>
                          
                        </tr>
                    ';
                  }
               
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>