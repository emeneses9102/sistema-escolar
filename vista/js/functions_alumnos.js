
$('#tablealumnos').DataTable();

var tableusuarios;

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablealumnos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": true,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        },dom: 'B<clear>frtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        /*"ajax":{
            "url":"./models/usuarios/table_usuarios.php",
            "dataSrc":"",
        },
        "columns":[
            {"data":"acciones"},
            {"data":"nombre"},
            {"data":"apellidos"},
            {"data":"telefono_fijo"},
            {"data":"dni"},
            {"data":"usuario"},
            {"data":"dni"},
            {"data":"dni"},
            {"data":"estado"},
        ],*/
        "responsive": true,
        "bDestroy":true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
    });
    /*var formUsuario = document.querySelector('#formUsuario');
    formUsuario.onsubmit = function(e){
        e.preventDefault();
        
        

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microfost.XMLHTTP');
        var url = './models/usuarios/ajax-usuarios.php';
        var form = new FormData(formUsuario);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function(){
            
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(request.status){
                    $('#modalUsuario').modal('hide');
                    formUsuario.reset();
                    swal('Usuario',data.msg,'success');
                    tableusuarios.ajax.reload();
                }else{
                    swal('Usuario',data.msg,'error');
                }
            }
        }
    }*/
});

$("#formUsuar").on('submit',function(e){
    e.preventDefault();
    var $form = $(this);

        var idusuario = document.querySelector('#idusuario').value;
        var nombre = document.querySelector('#nombre').value;
        var usuario = document.querySelector('#usuario').value;
        var clave = document.querySelector('#clave').value;
        var rol = document.querySelector('#listRol').value;
        var estado = document.querySelector('#listEstado').value;
        if(nombre == '' || usuario == ''){
            swal('Atención','Todos los campos son obligatorios','error');
            return false;
        }
        
    $.ajax({
        url			: './models/usuarios/ajax-usuarios.php',
        type		: 'POST',
        data		: $form.serialize(),
        dataType: 'json',
        success: function (data) {
            if(data.status == false){
                swal('Alerta',data.msg,'error');
            }else{
                $('#modalUsuario').modal('hide');
                formUsuario.reset();
                swal('Usuario',data.msg,'success');
                tableusuarios.ajax.reload();
            }
            
        },
        fail: function(data){
            swal('Usuario',data.msg,'error');
        }
    });
});
function inicioAlumno(){
    $('#DatosAlumno').hide();
    $('#EditDatosAlumno').hide();
}
inicioAlumno();
function openModalAlumnos()
{
    $('#idusuario').val('');
    $('#tituloModal').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo Alumno');
    $('#action').html('Guardar');
    $('#botonesAlumno').hide();
    $('#tituloAlumno').html('<i class="fa fa-user-plus"></i> Agregar Alumno');
    $('#DatosAlumno').show();
    $('#listAlumno').hide();
}


function closeModalAlumnos(){
   
    $('#botonesAlumno').show();
    $('#tituloAlumno').html('<i class="fa fa-dashboard"></i> Lista de Alumnos');
    $('#DatosAlumno').hide();
    $('#EditDatosAlumno').hide();
    $('#listAlumno').show();
    $('#formAlumno').removeClass("was-validated");
    document.querySelector("#formAlumno").reset();
    

}

function openModalEditarAlumno()
{
    $('#idusuario').val('');
    $('#tituloModal').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Editar Alumno');
    $('#action').html('Actualizar');
    $('#botonesAlumno').hide();
    $('#tituloAlumno').html('<i class="fa fa-user-plus"></i> Editar Alumno');
    $('#EditDatosAlumno').show();
    $('#listAlumno').hide();
}

function editarAlumno(id){
    openModalEditarAlumno();
    var idUsuario = id;
        $.ajax({
            url		: 'ajax/alumnos.ajax.php',
            type	: 'POST',
            data : {idUsuario : idUsuario},
            dataType: 'json',
            success: function (data) {
                $("#idusuario").val(data.usuario_id);
                $("#editNombre").val(data.nombres);
                $("#editApellidos").val(data.apellidos);
                if(data.foto != ""){
                    $('#editImgPerfil').attr('src',data.foto); 
                }
                //guardamos la foto actual
                $("#editFotoActual").val(data.foto);

                $("#editDireccion").val(data.direccion);
                $("#editTelefono").val(data.telefono_fijo);
                $("#editCelular").val(data.celular);
                $("#editDni").val(data.dni);
                $("#editDate").val(data.fecha_nacimiento);
                $("#editNacionalidad").val(data.nacionalidad);
                $("#editCorreo").val(data.correo);
                $("#editUsuario").val(data.usuario);
                //$("#clave").val(data.clave);
                //Guardamos la clave
                $("#editClaveActual").val(data.clave);
                $("#editCohorte").val(data.cohorte);
                $("#editListEstado").val(data.estado);
                //datos del apoderado
                $("#editNombre-ap").val(data.nombres_apoderado);
                $("#editApellidos-ap").val(data.apellidos_apoderado);
                $("#editDireccion-ap").val(data.direccion_apoderado);
                $("#editTelefono-ap").val(data.telefono_apoderado);
                $("#editCorreo-ap").val(data.correo_apoderado);
                $("#editTipo-ap").val(data.tipo_apoderado);
                $("#editDni-ap").val(data.dni_apoderado);
                $("#editOcupacion-ap").val(data.ocupacion_apoderado);
                //datos del apoderado2
                $("#editNombre-ap2").val(data.nombres_apoderado2);
                $("#editApellidos-ap2").val(data.apellidos_apoderado2);
                $("#editDireccion-ap2").val(data.direccion_apoderado2);
                $("#editTelefono-ap2").val(data.telefono_apoderado2);
                $("#editCorreo-ap2").val(data.correo_apoderado2);
                $("#editTipo-ap2").val(data.tipo_apoderado2);
                $("#editDni-ap2").val(data.dni_apoderado2);
                $("#editOcupacion-ap2").val(data.ocupacion_apoderado2);
                //datos del apoderado3
                $("#editNombre-ap3").val(data.nombres_apoderado3);
                $("#editApellidos-ap3").val(data.apellidos_apoderado3);
                $("#editDireccion-ap3").val(data.direccion_apoderado3);
                $("#editTelefono-ap3").val(data.telefono_apoderado3);
                $("#editCorreo-ap3").val(data.correo_apoderado3);
                $("#editTipo-ap3").val(data.tipo_apoderado3);
                $("#editDni-ap3").val(data.dni_apoderado3);
                $("#editOcupacion-ap3").val(data.ocupacion_apoderado3);
                
            },
            fail: function(data){
                
                swal('Usuario',data.msg,'error');
            }
        });
    

}

function modalEliminar(id){
    $("#deleteID").val(id)
    $("#modalClave").modal("show")
}

$("#btnDeleteID").click(function (e) { 
    e.preventDefault();
    var idusuario = $("#deleteID").val()
    var claveSeguridad = $("#claveSeguridad").val()
    var eliminar = 'eliminar'
        $.ajax({
            url		: 'ajax/alumnos.ajax.php',
            type	: 'POST',
            data: {idusuario : idusuario,
                eliminar : eliminar,
                claveSeguridad:claveSeguridad},
            success: function (data) {
                if(data == "pass"){
                    Swal.fire(
                        'Error',
                        'Contraseña Incorrecta',
                        'error'
                      )
                      $("#claveSeguridad").val("")
                } else if(data == "error"){
                    Swal.fire(
                        'Error',
                        'El alumno ya se encuentra inscrito a los cursos',
                        'error'
                      )
                      $("#claveSeguridad").val("")
                }else{
                    Swal.fire(
                        'Exito',
                        'Usuario Eliminado',
                        'success'
                      )
                      window.location = "alumnos";
                }
                
            },
            fail: function(data){
                Swal.fire(
                    'Error',
                    'Ocurrió un error2',
                    'error'
                  )
            }
        });
       
   
});

function desactivarAlumno(id){
  
}

function mostrarPerfil(id){
    var idusuario = id;
    location.href ="perfil_alumno.php?idusuario="+idusuario;
}

$('.nuevaFoto').change(function(){
    var imagen = this.files[0];
    //console.log("imagen",imagen);
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png")
    {
        $(".nuevaFoto").val("");
        swal.fire({
            type:"error",
            title : "Error al subir la imagen",
            text: "La imagen debe estar en formato PNG o JPG",
            confirmButtonText: "Cerrar",
        });
    }else if(imagen['size'] > 2000000){
        $(".nuevaFoto").val("");
        swal.fire({
            type:"error",
            title : "Error al subir la imagen",
            text: "La imagen no debe pesar mas de 2MB",
            confirmButtonText: "Cerrar",
        });
    }else
    {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load",function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }

})


function importarAlumnos(){
    
}

function estadoAlumno(e){
    $.ajax({
        type: "POST",
        url: "ajax/alumnos.ajax.php",
        data: {estadoAlumno:e},
        success: function (rpta) {
        }
      });
}