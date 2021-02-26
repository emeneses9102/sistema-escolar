<div class="app-title mb-0">
    <div>
        <h3 id="tituloCurso"><i class="fas fa-school"></i> Clase</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Generar Clase</a></li>
    </ul>
</div>

<div class="row user">
    <div class="col-md-2">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#listarClases" data-toggle="tab" id="listadeClases">Listar Clases</a></li>
                <li class="nav-item"><a class="nav-link " href="#agregarClase" data-toggle="tab" id="linkAgregar">Agregar Clases</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#editarClase" data-toggle="tab" id="linkEditar">Editar Clases</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="tab-content">
            <div class="tab-pane active" id="listarClases">
                <div class="tile user-settings">
                    <h4 class="line-head">Listar clases</h4>
                </div>
                <div class="row" id="listClases">
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered  m-auto" id="tablaClases">
                                        <thead class="text-center ">
                                            <tr>
                                                <th>Acciones</th>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Sección</th>
                                                <th>Grado</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $item = null;
                                            $valor = null;
                                            $orden = 1;
                                            $clases = ControladorClases::ctrMostrarClases($item, $valor);
                                            foreach ($clases as $value) {
                                                //$estado = ($value['estado']==1)? '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';
                                                echo '<tr>
                                                    <td><button class="btn btn-warning btn-sm mt-1" title="Editar" onclick="editarClase(' . $value["idClases"] . ')"><i class="fas fa-edit"></i></button>
                                                    </td>
                                                    <td>' . $value['codigo_clase'] . '</td>
                                                    <td>' . $value['nombre_aula'] . '</td>
                                                    <td>' . $value['nombre_seccion'] . '</td>
                                                    <td>' . $value['nombre_grado'] . '</td>
                                                    <td>' . $value['nombre_nivel'] . '</td>
                                                </tr>
                                            ';
                                                $orden++;
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
            <div class="tab-pane fade" id="agregarClase">
                <div class="tile user-settings">
                    <h4 class="line-head">Registrar clases</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="card border-primary mb-3 ">
                                <div class="card-body">
                                    <div class="form-inline">
                                        <h5 class="card-title">Detalles de la clase</h5>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3 mt-2">
                                            <label for="seccion">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre_clase" name="nombre_clase">
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <label for="seccion">Código:</label>
                                            <input type="text" class="form-control" id="codigo_clase" name="codigo_clase" required>
                                        </div>
                                        <div class="col-md-3 mt-2">
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
                                        <div class="col-md-3 mt-2">
                                            <label for="grado">Grado:</label>
                                            <select id="grado" class="form-control" type="text" name="grado" required>

                                            </select>
                                        </div>
                                        <div class="col-md-1 mt-3">
                                            <label for=""></label>
                                            <button class="btn btn-info btn-sm form-control"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container table-responsive px-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sección</th>
                                                    <th>Grado</th>
                                                    <th>Nivel</th>
                                                    <th class="p-0">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="GS_disponibles">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CREAR SECCIONES-->

            </div>
            <div class="tab-pane fade" id="editarClase">
                <div class="tile user-settings">
                    <h4 class="line-head">Editar Clase</h4>
                    <form action="" method="POST" id="efrmClase">
                        <div class="form-group">
                            <div class="card border-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Detalles de la clase</h5>
                                    <div class="form-group row">
                                        <div class="col-md-7">
                                            <input type="text" id="idClase" name="idClase" hidden>
                                            <label for="enombre_clase">Nombre de la clase:</label>
                                            <input id="enombre_clase" class="form-control" type="text" name="enombre_clase" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="ecodigo_clase">Código:</label>
                                            <input id="ecodigo_clase" class="form-control" type="text" name="ecodigo_clase" required>
                                        </div>
                                        <div class=" col-md-3 mt-4">
                                            <label for=""></label>
                                            <button type="submit" class="btn btn-primary btn-sm input mt-2">Actualizar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $actualizarCurso = new ControladorClases();
                            $actualizarCurso->ctrActualizarClase();
                            ?>
                    </form>
                </div>


            </div>
            <div class="tile user-settings">
                <h4 class="line-head">Asignar Cursos</h4>
                <div class="form-group row">
                    <div class="col-md-7 row" id="crusosAgregados">

                    </div>
                    <div class="col-md-5">
                        <h6>Listado de cursos</h6>
                        <div class="table-responsive">
                            <table class="table" id="tablaListadoCursos">
                                <thead class="table-warning">
                                    <tr>
                                        <th>codigo</th>
                                        <th>nombre</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_cursosD">

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

<!-- Modal -->
<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detallesModallLabel">Detalles del curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="text" id="idClase_curso_" name="idClase_curso_" hidden>
                    <input type="text" id="cod_curso" name="cod_curso" hidden>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for=""><b>Profesor :</b></label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="nombreProfesor" name="nombreProfesor" placeholder="Nombre" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="tituloProfesor" name="tituloProfesor" placeholder="titulo" disabled>
                            <input type="text" id="idProfesor" name="idProfesor" hidden>
                        </div>

                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered  m-auto px-2" id="tablaBuscarProfesores">
                                <thead>
                                    <tr class="text-center">
                                        <th>Cod</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Título</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $profesores = ControladorProfesores::ctrMostrarProfesor($item, $valor);
                                    foreach ($profesores as $value) {
                                        $estado = ($value['estado'] == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
                                        echo '<tr>
                                            <td >' . $value["usuario_id"] . '</th>
                                            <td>' . $value["nombres"] . ' ' . $value['apellidos'] . '</th>

                                            <td>' . $value['titulo'] . '</th>
                                            <td><span class="btn btn-info btn-sm mt-1 " title="AgregarProfesor" id="Agregar_Profesor"><i class="fas fa-plus"></i></span</th>
                                            </tr>
                                        ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for=""><b>Formato de calificación :</b></label>
                        </div>
                        <div class="col-md-9">

                            <select name="" class="form-control" id="formato_calificacion" name="formato_calificacion">
                                <option value="1">calificacion numérica</option>
                                <option value="2">calificacion letras</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn_Cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn_Guardar" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>