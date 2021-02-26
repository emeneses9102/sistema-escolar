<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Lista de Alumnos con deudas</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Alumnos-Deudas</a></li>
  </ul>
</div>
<div class="row" id="listDeudores">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tablaDeudas">
            <thead class="text-center">
              <tr>
                <th>Acciones</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Detalle</th>
                <th>Apoderado</th>
                <th>Sección</th>
                <th>Grado</th>
                <th>Nivel</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorListaDeuda :: ctrMostrarDeudores($item,$valor);
              foreach($usuarios as $value){
                $estado = ($value['estado']==1)? '<span class="badge badge-danger">Pendiente</span>': '<span class="badge badge-success">Cancelado</span>';
                echo'<tr>
                      <th><button class="btn btn-primary btn-sm mt-1" title="Editar Pago" id="editPago" name ="'.$value["usuario_id"].'" onclick="editarPago('.$value["usuario_id"].')"><i class="fas fa-user-edit"></i></button>
                     
                      <td>'.$value["nombres"].'</td>
                      <td>'.$value['apellidos'].'</td>
                      <td>'.$value['detalle'].'</td> 
                      <td>'.$value['nombres_apoderado']." ".$value['apellidos_apoderado'].'</td>
                      <td>'.$value['nombre_seccion'].'</td>
                      <td>'.$value['nombre_grado'].'</td>
                      <td>'.$value['nombre_nivel'].'</td>
                      <td id="estado_'.$value["usuario_id"].'">'.$estado.'</td>
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
<div class="row" id="editarDeuda" > 
    <div class="col-md-12">
        <div class="tile ">
        <h4 class="line-head">Editar Cobros</h4>
            <div class="container mt-4">
            <div class="row ">
                <div class="col-md-4">
                <p>
                    <label for="" class="h6">Alumno:</label>
                    <label for="" id="nombreAlumno"></label>
                </p>
                </div>
                <div class="col-md-4">
                <p >
                    <label for="" class="h6">Apoderado:</label>
                    <label for="" id="apoderadoAlum"></label>
                </p>
                
                </div> 
                <div class="col-md-4">
                <p >
                    <label for="" class="h6">Detalle :</label>
                    <label for="" id="detalle_"></label>
                </p>
                </div>
                <div class="col-md-12">
                    <label for="" class="h5">Pagos pendientes</label>
                    <div class="table-responsive">
                    <table class="table text-center" id="tablaDeudores">
                        <thead class="table-warning">
                            <tr>
                                <th>Código de Pago</th>
                                <th>Detalle</th>
                                <th>Fecha Venc.</th>
                                <th>Monto</th>
                                <th >Monto a cobrar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="">
                           
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
            <div class="form-inline mt-4">
                <button class="btn btn-info" id="btnInfo">Regresar</button>
                
            </div>
            </div>
            
        </div>
    </div>
</div>