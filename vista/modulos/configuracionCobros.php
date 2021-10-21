<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fas fa-file-invoice-dollar mr-1"></i>Configuración de pagos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-file-invoice-dollar"></i></li>
    <li class="breadcrumb-item"><a href="#">Configuración de pagos</a></li>
  </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile row">
            <div class="col-md-5 pr-md-5 borde">
                <h4 class="tile-title">Registrar cobros</h4>
                <div class=" container">
                    <form action="" method="POST" id="frmCobros">
                        <div class="form-group row ">
                            <div class="col-md-4 text-md-right pt-2">
                                <label for="" class="h6">Código de pago:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="cod_pago" name="cod_pago" disabled>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-4 text-md-right pt-2">
                                <label for="" class="h6">Detalle del Pago:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="detalle_pago" name="detalle_pago" >
                                <div id="error_DP"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-4 text-md-right pt-2">
                                <label for="" class="h6">Fecha de Vencimiento:</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control"  type="date"  id="fecha_vencimiento" name="fecha_vencimiento" required>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-4 text-md-right pt-2">
                                <label for="" class="h6">Monto a cobrar:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="monto" name="monto" required>
                            </div>
                            <div class="col-md-2 text-md-right pt-2">
                                <label for="" class="h6">Dirigido a:</label>
                            </div>
                            <?php
                                $item = null;
                                $valor = null;
                                $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                                //var_dump($mostrarNiveles);
                            ?>
                            <div class="col-md-3">
                                <select name="cob_nivel" id="cob_nivel" class="form-control" required>
                                <?php foreach ($mostrarNiveles as $nivel) {     ?>
                                        <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-inline " id="botones">
                            <button class="btn btn-primary ml-auto" id="btnAgregarCobro"><i class="fas fa-save   mr-1 "></i> Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 pl-md-5">
                <h4 class="tile-title">Cobros Registrados</h4>
                <div class="table-responsive container">
                    <table class="table text-center" id="tablaCobros">
                        <thead class="table-warning">
                            <tr>
                                <th>Código de Pago</th>
                                <th>Detalle</th>
                                <th>Fecha Venc.</th>
                                <th>Monto a cobrar</th>
                                <th>Grupo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="listaCobros">
                            <?php
                            $item = null;
                            $valor = null;
                            $cobros = ControladorCobros :: ctrMostrarCobros($item,$valor);
                            foreach($cobros as $value){
                               
                                echo'<tr>
                                    
                                    <td>'.$value["codigo"].'</td>
                                    <td>'.$value['detalle'].'</td>
                                    <td>'.$value['fecha_vencimiento'].'</td>
                                    <td>'.$value['monto'].'</td>
                                    <td><b>'.$value['nombre_nivel'].'</b></td>
                                    <td><button type="button" class="btn btn-warning btn-sm px-1 mr-2 " onclick="editarCobro('.$value["idCobros"].')" title="Editar" data-toggle="modal" data-target="#pagoModal"><i class="fas fa-edit    "></i> </button>
                                    <button type="button" class="btn btn-danger btn-sm px-1 " onclick="eliminarCobro('.$value["idCobros"].')" title="Eliminar" data-toggle="modal" data-target="#pagoModal"><i class="fas fa-trash    "></i> </button></td>
                                </tr>';
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



