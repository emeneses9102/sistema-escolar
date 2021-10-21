<div class="app-title ">
    <div>
        <h3 id="tituloAlumno"><i class="fas fa-school"></i> División del periodo académico </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">División del periodo académico</a></li>
    </ul>
</div>
<div class="user">
    <div class="col-md-12 tile ">
        <h5>Registrar Divisiones del periodo</h5>
        <hr>
       <div class="container mt-4">
            <div class=" row">
                <div class="col-md-4 row mt-3 ">
                <form id="formPeriodos">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" form-group row">
                                <label for="" class="col-md-4 h6 pt-2">Nombre:</label>
                                <input type="text" class="form-control col-md-8" id="nombrePeriodo" name="nombrePeriodo" required>
                                <input type="text" class="form-control col-md-8" hidden id="idPeriodo" name="idPeriodo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class=" form-group row">
                                <label for="" class="col-md-4 h6 pt-2">Abreviación:</label>
                                <input type="text" class="form-control col-md-8" id="abreviacionPeriodo" name="abreviacionPeriodo" required>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class=" form-group row">
                                <label for="" class="col-md-4 h6 pt-2">Peso:</label>
                                <input type="text" class="form-control col-md-8" id="pesoPeriodo" name="pesoPeriodo">
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="form-inline">
                                <button type="submit" class="btn btn-primary  ml-auto" id="agregarPeriodo">Agregar <i class="fas fa-arrow-alt-circle-right ml-2"></i></button>
                                <button type="submit" class="btn btn-warning  ml-auto" id="editarPeriodo" style="display: none;">Editar <i class="fas fa-arrow-alt-circle-right ml-2"></i></button>
                                <button type="button" class="btn btn-danger ml-1" id="cancelarPeriodo">Cancelar <i class="fas fa-times-circle ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-md-8  pl-md-3">
                    <div class="table-responsive pl-md-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Abreviatura</th>
                                    <th>Peso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="listaPeriodos">
                            <?php
                                $periodos = ControladorPeriodos::ctrMostrarPeriodos();
                                foreach($periodos as $value){
                                    echo '
                                        <tr>
                                        <td>'.$value["nombrePeriodo"].'</td>
                                        <td>'.$value["abreviacionPeriodo"].'</td>
                                        <td>'.$value["pesoPeriodo"].' %</td>
                                        <td><button class="btn btn-primary btn-sm " title="Editar" onclick="editarPeriodo('.$value["idPeriodoAcademico"].')" ><i class="far fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm " title="Eliminar" onclick="eliminarPeriodo('.$value["idPeriodoAcademico"].')"><i class="fas fa-trash"></i></i></button>
                                        </td>
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