<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fas fa-mail-bulk    "></i> Correos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Correo</a></li>
  </ul>
</div>

<div class="row">
    <div class="col-md-12">
       <form action="">
        <div class="tile">
                <h3 class="tile-title">Envío de correos</h3>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#enviar">Enviar Correo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#historial">Historial</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade active show" id="enviar">
                            <div class="">
                                <div class="form-group row">
                                    <label for="" class="col-md-3 text-right control-label h6 pt-1">DE * :</label>
                                    <input type="text" class="form-control col-md-5 " placeholder="Remitente">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 text-right control-label h6 pt-1" >PARA * :</label>
                                    <input type="text" class="form-control col-md-5"placeholder="Destinatario">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 text-right control-label h6 pt-1" >ASUNTO * :</label>
                                    <input type="text" class="form-control col-md-5"placeholder="Asunto">
                                </div>
                            </div>
                            <div class="contenedor row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <textarea name="editor" id="editor" cols="30" rows="10"></textarea>
                                <div class="form-inline">
                                    <button class="btn btn-primary mt-1 ml-auto"><i class="fas fa-envelope mr-2"></i>Enviar</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="historial">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Para</th>
                                            <th>Tipo</th>
                                            <th>Detalles</th>
                                            <th>Remitente</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>Profesores</td>
                                            <td>Correo</td>
                                            <td>Reunión de profesores el día viernes 16/03/2021</td>
                                            <td>Juan Perez</td>
                                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></button></td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>