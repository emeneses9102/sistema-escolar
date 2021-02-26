<div class="app-title mb-0">
    <div>
        <h3 id="tituloAlumno"><i class="fas fa-school"></i> Grados y Secciones </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Registrar Grados y secciones</a></li>
    </ul>
</div>
<div class="row user">
    <div class="col-md-2">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#gradosySecciones" data-toggle="tab" id="linkGS">Grados y Secciones</a></li>
                <li class="nav-item"><a class="nav-link" href="#editarGS" data-toggle="tab" id="linkAgregarGS">Editar Grados y Secciones</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="tab-content">
            <div class="tab-pane active" id="gradosySecciones">
                <?php
                $item = null;
                $valor = null;
                $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                //var_dump($mostrarNiveles);
                ?>
                <!--CREAR GRADOS-->
                <div class="tile user-settings">
                    <h4 class="line-head">Crear Grados</h4>
                    <form action="" method="POST" id="formGrados">
                        <div class="form-group row">
                            <div class="col-md-5 ">
                                <label for="" class="h6">Nombre del grado: </label>
                                <input type="text" name="nombreGrado" id="nombreGrado" class="form-control">
                            </div>
                            <div class="col-md-4 ">
                                <label for="" class="h6">Nivel</label>
                                <select name="niveles" id="niveles" class="form-control">
                                    <?php foreach ($mostrarNiveles as $nivel) {     ?>
                                        <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <button class="btn btn-primary  form-control mt-md-4">Registrar Grado</button>
                            </div>
                        </div>
                        <?php
                        $crearGrado = new ControladorGradosySecciones();
                        $crearGrado->ctrCrearGrados();
                        ?>
                    </form>
                </div>
                <!--CREAR SECCIONES-->
                <div class="tile user-settings">
                    <h4 class="line-head">Crear Secciones</h4>
                    <form action="" id="formSecciones" method="POST">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="nombreSeccion" class="h6">Nombre de la sección: </label>
                                <input type="text" class="form-control" name="nombreSeccion" id="nombreSeccion">
                            </div>
                            <div class="col-md-4">
                                <label for="letraCodigo" class="h6">Letra/Código</label>
                                <input type="text" class="form-control" name="letraCodigo" id="letraCodigo">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary form-control mt-md-4">Registrar sección</button>
                            </div>
                        </div>
                        <?php
                        $crearGrado = new ControladorGradosySecciones();
                        $crearGrado->ctrCrearSecciones();
                        ?>
                    </form>
                </div>
                <div class="tile user-settings">

                    <h4 class="line-head">Secciones</h4>
                    <form action="">
                        <div class="form-group row">
                            <div class="col-md-3 ">
                                <label for="" class="h6">Nivel</label>
                                <select name="niveles2" id="niveles2" class="form-control">
                                    <?php foreach ($mostrarNiveles as $nivel) { ?>
                                        <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="prueba"></div>
                            <div class="col-md-1 ">
                                <label for="" class="h6"></label>
                                <button type="button" class="btn btn-info  form-control mt-2" onclick="mostrarGrados()">Buscar</button>

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class=" col-md-12 row">
                                <div class="col-md-3">
                                    <div class="bs-component">
                                        <div class="list-group listarGrados">
                                            <div class="list-group-item list-group-item-action bg-info text-white " href="#">
                                                Listado de secciones
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card mb-3 border-primary">
                                        <div class="card-body card-secciones " disabledbutton>
                                            <blockquote class="card-blockquote row">
                                                <div class="col-md-12" id="datos_grado">
                                                    <span class="h6" id="titulo_grado">Datos del Grado</span>

                                                </div>
                                                <?php
                                                $dato = "";
                                                $mostrarSecciones = ControladorGradosySecciones::ctrMostrarSecciones($dato);

                                                ?>
                                                <div class="col-md-8">
                                                    <label for="">Nombre de la sección:</label>

                                                    <select name="nombre_seccion" id="nombre_seccion" class="form-control" disabled>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for=""></label>
                                                    <button class="btn btn-info form-control mt-2" id="btnAgregarSeccion" disabled>Agregar</button>

                                                </div>

                                            </blockquote>
                                            <hr>
                                            <div class="container row text-center" id="lista_secciones">
                                                <div class="col-md">
                                                    <p class="text-info h6">seccion A</p>
                                                </div>
                                                <div class="col-md">
                                                    <p class="text-info h6">seccion A</p>
                                                </div>
                                                <div class="col-md">
                                                    <p class="text-info h6">seccion A</p>
                                                </div>
                                                <div class="col-md">
                                                    <p class="text-info h6">seccion A</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="tab-pane fade" id="editarGS">
                <?php
                $item = null;
                $valor = null;
                $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                //var_dump($mostrarNiveles);
                ?>
                <div class="tile user-settings">
                    <h4 class="line-head">Editar Grados</h4>
                    <form action="" method="POST" id="formEditarGrados">
                        <div class="form-group row">
                            <div class="col-md-5 ">
                                <label for="" class="h6">Nombre:</label>
                                <input type="text" name="enombreGrado" id="enombreGrado" class="form-control" require disabled>
                                <input type="text" name="e_idGrado" id="e_idGrado" class="form-control" hidden>
                            </div>
                            <div class="col-md-4 ">
                                <label for="" class="h6">Nivel</label>
                                <select name="eniveles" id="eniveles" class="form-control" disabled>
                                    <?php foreach ($mostrarNiveles as $nivel) {     ?>
                                        <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <label for="" class="h6"></label>
                                <button class="btn btn-primary  form-control" type="submit" id="actualizar_grado" disabled>Actualizar</button>
                            </div>
                        </div>
                        <?php
                        $actualizarGrado = new ControladorGradosySecciones();
                        $actualizarGrado->ctrActualizarGrados();
                        ?>
                    </form>
                </div>
                <div class="tile user-settings">
                    <h4 class="line-head">Editar Secciones</h4>

                    
                        <div class="row px-4 py-1" id="listaSecciones">
                            <div class="col-md-6 table-responsive px-md-5 text-center">
                                    <label for="" class="h6">Secciones agregadas</label>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="secciones_agregadas">
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 table-responsive px-md-5 text-center">
                                <label for="" class="h6">Secciones disponibles</label>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="secciones_disponibles">
                                        
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