<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Directorio</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Directorio</a></li>
  </ul>
</div>
<div class="row" id="listAlumno">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tablealumnos">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombres y Apellidos</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Tipo de usuario</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr> 
                <td>
                    1
                </td>
                <td><a href="" data-toggle="modal" data-target="#modalAño">Juan Zevallos Alca</a> </td>
                <td>JZevallosA</td>
                <td>juancito@correo.com</td>
                <td>Alumno</td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
            <tr> 
                <td>
                    2
                </td>
                <td><a href="" data-toggle="modal" data-target="#modalAño">Pedro Perez Manta</a></td>
                <td>Pperezm</td>
                <td>Pedrito@correo.com</td>
                <td>Alumno</td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
            <tr> 
                <td>
                    3
                </td>
                <td><a href="" data-toggle="modal" data-target="#modalAño">Efrain Gomez Antunes</a> </td>
                <td>EGomezA</td>
                <td>efrainto@correo.com</td>
                <td>Profesor</td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
            <tr> 
                <td>
                    4
                </td>
                <td><a href="" data-toggle="modal" data-target="#modalAño">Efrain  Gomez Antunes</a></td>
                <td>EGomezA</td>
                <td>efrainto@correo.com</td>
                <td>Profesor</td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
           

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAño" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="title-body text-center">
        <img src="vista/images/admin.png" alt="imagen" class="img-fluid" width="120px">
        <h6 class="text-center mt-2">Juan Zevallos Alca</h6>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody class="text-center">
                    <tr>
                        <th>Nombre Completo</th>
                        <td>Juan Zevallos Alca</td>  
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <td>JZevallosA</td>
                    </tr>
                    <tr>
                        <th>Correo electrónico</th>
                        <td>juancito@correo.com</td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento</th>
                        <td>18/06/2000</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>Calle Girasol, MZ A LT21, Urb Santa Teresa</td>
                    </tr>
                    <tr>
                        <th>Teléfono fijo</th>
                        <td>68596545</td>
                    </tr>
                    <tr>
                        <th>Celular</th>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>
  </div>
</div>