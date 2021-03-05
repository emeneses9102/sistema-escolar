<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fas fa-file-invoice-dollar mr-1"></i>Registrar Pagos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-file-invoice-dollar"></i></li>
    <li class="breadcrumb-item"><a href="#">Registrar Pagos</a></li>
  </ul>
</div>
<div class="row" >
  <div class="col-md-12">
    <div class="tile">
        <div class="form-inline">
            <h4 class="tile-title">Buscar alumno</h4>
            <div class="ml-auto form-inline">
                
                <div class="animated-radio-button  mr-2" >
                <label>
                    <input type="radio" name="radio" id="rCodigo" value="codigo"><span class="label-text">Código de alumno</span>
                </label>
                </div>
                <div class="animated-radio-button  mr-2" >
                <label>
                    <input type="radio" name="radio" id="rDNI" value="dni"><span class="label-text">DNI de alumno</span>
                </label>
                </div>
                <div class="animated-radio-button  mr-3" >
                <label>
                    <input type="radio" name="radio" id="rNombre" value="nombre"><span class="label-text">Apellido de alumno</span>
                </label>
                </div>
                
                <input type="text" class="form-control  mr-2" id="textoBuscar" name="textoBuscar" >
                <button class="btn btn-primary btn-sm mt-2  mb-2" id="btnBuscarAlumno"><i class="fa fa-search" aria-hidden="true"></i>Buscar</button>
            </div>
        </div>
      <div class="tile-body mt-4 mx-md-5">
        <div class="table-responsive ">
          <table class="table table-hover table-bordered  m-auto" >
            <thead>
              <tr>
                <th>Nombre del alumno</th>
                <th>Código</th>
                <th>Documento</th>
                <th>Sección</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody id="datosAlumno">
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mostrarDatos" tabindex="-1" aria-labelledby="mostrarDatosLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title " id="mostrarDatosLabel">Datos del alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <div class="row">
            <div class="col-md-12  row my-2">
                <div class="col-6 col-md-3  text-md-right">
                    <h6>Nombres y apellidos:</h6>
                </div>
                <div class=" col-6 col-md-3 ">
                    <label for="" id="nombreAlum">Edgar Meneses</label>
                </div>
                <div class="col-6 col-md-3  text-md-right">
                    <h6>Código de alumno:</h6>
                </div>
                <div class="col-6 col-md-3 ">
                    <label for="" id="codigoAlum">NN-0053</label>
                </div>
            </div>
            <div class=" col-md-12  row my-2">
                <div class="col-6 col-md-3 text-md-right">
                    <h6>Dirección del alumno:</h6>
                </div>
                <div class="col-6 col-md-9 text-md-left">
                    <label for="" id="direccionAlum">Calle los proceres de la independencia, Lima , Lima</label>
                </div> 
            </div>
            <div class=" col-md-12  row my-2">
                <div class="col-6 col-md-3 text-md-right">
                    <h6>DNI del Alumno:</h6>
                </div>
                <div class="col-6 col-md-3  text-md-left">
                    <label for="" id="dniAlum">47453031</label>
                </div>
                <div class="col-6 col-md-3 text-md-right">
                    <h6>Nivel y grado:</h6>
                </div>
                <div class="col-6 col-md-3  text-md-left">
                    <label for="" id="gradoAlum">Primer Grado de Primaria</label>
                </div>
            </div>
        </div>
        <hr>
        <h5>Datos del Apoderado</h5>
        <hr>
        <div class="row">
            <div class="col-md-12  row my-2">
                <div class="col-6 col-md-3  text-md-right">
                    <h6>Nombres y apellidos:</h6>
                </div>
                <div class=" col-6 col-md-3 ">
                    <label for="" id="nombreApod">Edgar Meneses</label>
                </div>
                <div class="col-6 col-md-3  text-md-right">
                    <h6>DNI del apoderado:</h6>
                </div>
                <div class="col-6 col-md-3 ">
                    <label for="" id="dniApod">47453031</label>
                </div>
            </div>
            <div class=" col-md-12  row my-2">
                <div class="col-6 col-md-3 text-md-right">
                    <h6>Dirección del Apoderado:</h6>
                </div>
                <div class="col-6 col-md-9 text-md-left">
                    <label for="" id="direccionApod">Calle los proceres de la independencia, Lima , Lima</label>
                </div> 
            </div>
            
        </div>
        
        <div class="row justify-content-center mt-2">
            <a class="btn btn-info " href="https://ww1.sunat.gob.pe/ol-ti-itfesimpopciones/FESimpSunat.htm" target="_blank">Generar Boleta</a>
            
        </div>
    </div>
  </div>
</div>