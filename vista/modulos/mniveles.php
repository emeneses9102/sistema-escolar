<div class="app-title mb-0">
  <div>
    <h3 id="tituloUsuario"><i class="fa fa-book"></i>Niveles educativos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-book fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#"> Niveles educativos</a></li>
  </ul>
</div>
<div class="row user">    
  <div class="col-md-2">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#niveles" data-toggle="tab" id="linkNiveles">Niveles actuales</a></li>
        <li class="nav-item"><a class="nav-link" href="#agregarNiveles" data-toggle="tab" id="linkAgregar">AgregarNiveles</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">
    <div class="tab-content">
      <div class="tab-pane active" id="niveles">
        <?php
          $item = null;
          $valor = null;
          $mostrarNiveles = ControladorNiveles :: ctrMostrarNiveles($item,$valor);
          //var_dump($mostrarNiveles);
        ?>
        <div class="tile user-settings">
          <h4 class="line-head">Niveles educativos para el presente año</h4>
          
          <div class="row">
            <?php 
              foreach ($mostrarNiveles as $nivel) {
                
                  $valor = $nivel['idNiveles'];
                  $mostrarGrados = ControladorGradosySecciones :: ctrMostrarGrados($valor);
                  //var_dump($mostrarNiveles);
               
               echo '
                <div class="col-md-4">
                  <div class="widget-small mb-2 bg-'.$nivel['color'].'"><i class="icon fa fa-users fa-3x"></i>
                      <div class="info detalle_'.$nivel['idNiveles'].'">
                        <span hidden>'.$nivel['color'].'</span>
                        <h4>'.$nivel['nombre_nivel'].'</h4>
                        <p class="font-weight-bol">'.$nivel['descripcion'].'</p>
                      </div>
                      
                  </div>
                  <div class="form-inline">
                    <div class="btn-group ml-auto">
                      <a class="btn btn-primary btn-sm ml-auto" id="editNivel" onclick="editNivel('.$nivel['idNiveles'].')" href="#"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-primary btn-sm " id="deleteNivel" onclick="deleteNivel('.$nivel['idNiveles'].')" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </div>
                  </div>
                  <div class="card mb-3 border-primary mt-1">
                      <div class="card-body">
                      ';
                      foreach ($mostrarGrados as $grados) {
                        echo'
                        <p class="">'.ucwords($grados['nombre_grado']).'</p>';
                      }
                      echo'
                      </div>
                  </div>
                </div>
               
               ';
              }
            
            ?>
            
          </div>
          <hr>
          
        </div>
      </div>
      <div class="tab-pane fade" id="agregarNiveles">
        
        <div class="timeline-post">
        <div class="pb-2">
          <h4 class="line-head tConf">Configurar Niveles</h4>
        </div>
        <form action="" id="formNiveles" method="POST">
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="nombreNivel">Nombre del nivel:</label>
                    <input id="nombreNivel" class="form-control" type="text" name="nombreNivel" required>
                </div>
                <div class="col-md-4">
                    <label for="">Selecciona el color</label>
                    
                    <select class="form-control" name="nivel_color" id="nivel_color">
                      <option value="primary" class="bg-primary text-white">Primario</option>
                      <option value="info" class="bg-info text-white">Celeste</option>
                      <option value="warning" class="bg-warning text-white">Amarillo</option>
                      <option value="danger" class="bg-danger text-white">Rojo</option>
                      <option value="success" class="bg-success text-white">Verde</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="my-input">Descripción:</label>
                <textarea name="descripcionNivel" id="descripcionNivel" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="closeNuevoNivel()">Cerrar</button>
              <button type="submit" id="btnGuardarNivel" class="btn btn-primary btnGuardar">Guardar</button>
              </div>
            <?php
              $crearNivel = new ControladorNiveles();
              $crearNivel->ctrCrearNiveles();
            ?>
        </form>
        <form action="" id="eformNiveles" method="POST" hidden>
            <div class="form-group row">
                <div class="col-md-8">
                  <input type="text" id="idNivel" name="idNivel" hidden>
                    <label for="nombreNivel">Nombre del nivel:</label>
                    <input id="enombreNivel" class="form-control" type="text" name="enombreNivel" required>
                </div>
                <div class="col-md-4">
                    <label for="">Selecciona el color</label>
                    
                    <select class="form-control" name="enivel_color" id="enivel_color">
                      <option value="primary" class="bg-primary text-white">Primario</option>
                      <option value="info" class="bg-info text-white">Celeste</option>
                      <option value="warning" class="bg-warning text-white">Amarillo</option>
                      <option value="danger" class="bg-danger text-white">Rojo</option>
                      <option value="success" class="bg-success text-white">Verde</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="my-input">Descripción:</label>
                <textarea name="edescripcionNivel" id="edescripcionNivel" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="closeNuevoNivel()">Cerrar</button>
              <button type="submit" id="btnEditarNivel" class="btn btn-primary btnEditar " >Actualizar</button>
              </div>
            <?php
              $editarNivel = new ControladorNiveles();
              $editarNivel->ctrActualizarNivel();
            ?>
        </form>
      </div>

      
    </div>
  </div>
</div>


