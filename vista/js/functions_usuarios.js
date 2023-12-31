$('#tableusuarios').DataTable();

var tableusuarios;

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tableusuarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
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
        },
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
function inicio(){
    $('#DatosUsuario').hide();
    $('#EditDatosUsuario').hide();
}
inicio();
function openModal()
{
    $('#idusuario').val('');
    $('#tituloModal').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo Alumno');
    $('#action').html('Guardar');
    $('#botonesUsuario').hide();
    $('#tituloUsuario').html('<i class="fa fa-user-plus"></i> Agregar Alumno');
    $('#DatosUsuario').show();
    $('#listUsuario').hide();
}


function closeModal(){
   
    $('#botonesUsuario').show();
    $('#tituloUsuario').html('<i class="fa fa-dashboard"></i> Lista de Usuarios');
    $('#DatosUsuario').hide();
    $('#EditDatosUsuario').hide();
    $('#listUsuario').show();
    document.querySelector("#formUsuario").reset();
}

function openModalEditar()
{
    $('#idusuario').val('');
    $('#tituloModal').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Editar Alumno');
    $('#action').html('Actualizar');
    $('#botonesUsuario').hide();
    $('#tituloUsuario').html('<i class="fa fa-user-plus"></i> Editar Alumno');
    $('#EditDatosUsuario').show();
    $('#listUsuario').hide();
}

function editarUsuario(id){
    openModalEditar();
    var idUsuario = id;
        $.ajax({
            url		: 'ajax/usuarios.ajax.php',
            type	: 'POST',
            data : {idUsuario : idUsuario},
            dataType: 'json',
            success: function (data) {
                $("#idusuario").val(data.usuario_id);
                $("#editNombre").val(data.nombre);
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
                $("#editListRol").val(data.rol);
                $("#editListEstado").val(data.estado);
                //datos del apoderado
                $("#editNombre-ap").val(data.nombre_responsable);
                $("#editApellidos-ap").val(data.apellido_responsable);
                $("#editDireccion-ap").val(data.direccion_responsable);
                $("#editTelefono-ap").val(data.telefono_responsable);
                $("#editCorreo-ap").val(data.correo_responsable);
                $("#editTipo-ap").val(data.tipo_responsable);
                $("#editDni-ap").val(data.dni_responsable);
                $("#editOcupacion-ap").val(data.ocupacion);
                
            },
            fail: function(data){
                
                swal('Usuario',data.msg,'error');
            }
        });
    

}

function desactivarUsuario(id){
    var idusuario = id;
    var desactivar = 'descativar';
    

    Swal.fire({
        title: 'Realmente desea desactivar el usuario?',
        showDenyButton: true,
        
        confirmButtonText: `Sí, eliminar`,
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            $.ajax({
                url		: 'ajax/usuarios.ajax.php',
                type	: 'POST',
                data: {idusuario : idusuario,
                desactivar : desactivar},

                success: function (data) {
                        $('#'+'estado_'+idusuario).html('<span class="badge badge-danger">Inactivo</span>');
                },
                fail: function(data){
                    swal('Atención',data.msg,'error');
                }
            });

        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })

    
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