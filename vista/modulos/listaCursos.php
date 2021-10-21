<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Lista Cursos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Lista Cursoss</a></li>
  </ul>
</div>

<div class="row" id="listCursos">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
      <div class="col-md-12 row">
            <?php
              $item = null;
              $valor = null;
              $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
              //var_dump($mostrarNiveles);
              ?>
           <div class="form-group col-md-3">
            <label for="" class="h6">Niveles</label>
            <select name="nivelesLC" id="nivelesLC" class="form-control">
              <option></option>
            <?php foreach ($mostrarNiveles as $nivel) { ?>
                
                <option value="<?php echo $nivel['nombre_nivel'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="" class="h6">Grados</label>
            <select name="gradosLC" id="gradosLC" class="form-control">
            
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="" class="h6">Sección</label>
            <select name="seccionLC" id="seccionLC" class="form-control">
            </select>
          </div>
          
          <div class="form-group col-md-2">
           
            <div class="form-inline mt-4">
              <button class="btn btn-info ml-auto" id="btnClearFilter" name="btnClearFilter"><i class="fas fa-filter"></i> Limpiar filtro</button>
            </div>
          </div>

        </div>
        <hr>
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tableCursos">
            <thead>
              <tr class="text-center">
                <th>Nivel</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Nombre del Curso</th>
                <th>Profesor</th>
                <th>N° de Alumnos</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $cursos = ControladorListaCursos :: ctrMostrarCursos($item,$valor);
              foreach($cursos as $value){
                $numAlumnos = ($value['idAlumno'] == "" || $value['idAlumno'] == null)?"0":$value['numeroAlumnos'];
                
                echo'<tr>
                      <td>'.$value['nombre_nivel'].'</td>
                      <td>'.$value['nombre_grado'].'</td>
                      <td>'.$value['nombre_seccion'].'</td>
                      <td>'.$value['nombre_curso'].'</td>
                      <td>'.$value['apellidos'].', '.$value["nombres"].'</td>
                      <td>'.$numAlumnos.'</td>
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

