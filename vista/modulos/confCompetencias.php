<div class="app-title mb-0">
  <div>
    <h3 id="ConfCompetencias"><i class="fas fa-school"></i> Configurar Competencias</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Configurar Competencias</a></li>
  </ul>
</div>
<div class="row user">
  <div class="col-md-2">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#confCompetencias" data-toggle="tab" id="confiCompentecias" >Configurar competencias</a></li>
        <li class="nav-item"><a class="nav-link " href="#confCapacidades" data-toggle="tab" id="confiCapacidades">Configurar capacidades</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">
    <div class="tab-content">
      <div class="tab-pane active" id="confCompetencias">
        <div class="row">
          <div class="col-md-12">
          <div class="tile user-settiings">
          <h4 class="line-head">Configurar Competencias</h4>
          <div class="container-fluid mt-4">
            <form action="" method="POST" id="formCompetencias" rol="form">
                <div class="form-group row competencias">
                  <label for="nombre_inst" class="col-form-label col-lg-2 h5 ">Nombre de la competencia :</label>
                  <div class="col-lg-8">
                      <input type="text" class="form-control " id="nombre_competencia" name="nombre_competencia" required >
                  </div>
                  <div class='col-lg-2'>
                    <div class='form-inline'>
                      <button  class='btn btn-danger btn-block' onclick="BotonCancelar()" id='btncancelar'>Cancelar</button>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre_inst" class="col-form-label col-lg-2 h5 ">Nombre corto :</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control " id="nombre_cortoCompetencia" name="nombre_cortoCompetencia" required >
                    </div>
                    <label for="nombre_inst" class="col-form-label col-lg-1 h5 text-">Siglas :</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control " id="identificador_competencia" name="identificador_competencia" required>
                    </div>
                    <div class="col-lg-2">
                    <div class="form-inline">
                      <input type="submit" class="btn btn-primary" id="btnCompetencia" value="Registrar">
                    </div>
                    </div>
                </div>
                
            </form>
            <!--Tabla-->
            <div class="table-responsive mt-5">
                  <table class="table table-hover table-bordered  m-auto" id="tablaCompetencias">
                    <thead class="text-center ">
                      <tr>
                        <th style="width: 150px;">Acciones</th>
                        <th style="width: 150px;">Siglas</th>
                        <th>Nombre</th>
                        <th>Nombre Corto</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                      $item = null;
                      $valor = null;
                      $competencias = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
                      foreach ($competencias as $value) {
                        //$estado = ($value['estado']==1)? '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';
                        echo '<tr>
                                <td><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarCompetencia('.$value->idCompetencia.')"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar"  onclick="eliminarCompetencia('.$value->idCompetencia.')"><i class="fas fa-trash-alt"></i></button></td>
                                <td>' . $value->identificadorCompetencia. '</td>
                                <td>' . $value->nombreCompetencia. '</td>
                                <td>' . $value->nombreCorto. '</td>
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
      </div>
    </div>
  </div>
</div>