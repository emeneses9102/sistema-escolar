
$('#tablaCobros').DataTable();

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablaCobros').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "info":false,
        "ordering": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando _TOTAL_ registros",
            "sInfoEmpty":      "0 registros",
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

$("#btnAgregarCobro").click(function (e) { 
    e.preventDefault();
   
    agregarCobros();
});

function agregarCobros(){
    var cod_pago = $("#cod_pago").val();
    var detalle_pago = $("#detalle_pago").val();
    var fecha_vencimiento = $("#fecha_vencimiento").val();
    var monto =$("#monto").val();
    var cob_niveles = cob_nivel.options[cob_nivel.selectedIndex].value;
    $.ajax({
        url	    : 'ajax/cobros.ajax.php',
        type    : 'POST',
        data    : {cod_pago : cod_pago,
                    detalle_pago:detalle_pago,
                    fecha_vencimiento : fecha_vencimiento,
                    monto:monto,
                    cob_niveles:cob_niveles},
        success: function(data){
            if(data = "ok"){
                swal.fire({
                    icon:"success",
                    title : "Cobro registrado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "El cobro no ha sido registrado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            $("#frmCobros")[0].reset();
            mostrarCobros();
        }
    });
}


function mostrarCobros(){
    var mostrar="";
    $("#listaCobros").empty();
    $.ajax({
        url	    : 'ajax/cobros.ajax.php',
        type    : 'POST',
        data    : {mostrar:mostrar},
        dataType:   "json",
        success: function(data){
            var tabla = $("#tablaCobros").DataTable();
            tabla.clear().draw();
            for(let item of data){
                
                
                tabla.row.add(
                    [
                "<td>"+item.codigo+"</td>",
                "<td>"+item.detalle+"</td>",           
                "<td>"+item.fecha_vencimiento+"</td>",
                "<td>"+item.monto+"</td>",
                "<td><b>"+item.nombre_nivel+"</b></td>",
                "<td><button type='button' class='btn btn-warning btn-sm px-1 mr-2 ' onclick='editarCobro("+item.idCobros+")' title='Editar' data-toggle='modal' data-target='#pagoModal'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-danger btn-sm px-1 ' onclick='eliminarCobro("+item.idCobros+")' title='Eliminar' data-toggle='modal' data-target='#pagoModal'><i class='fas fa-trash'></i></button></td>",
                ]
                ).draw(false);
                
            }
            
        
        }
    }); 
}

function pasarDatos(idCobro){
    $("#btnActualizar").remove();
    $("#botones").append("<button type='button' class='btn btn-info ml-auto' onclick='editCobro()' id='btnActualizar' ><i class='fas fa-save   mr-1 '></i> Actualizar</button>");
    $("#botones").append("<button  onclick='cancelar()' class='btn btn-danger ml-2' id='btnCancelar'><i class='fas fa-save   mr-1 '></i> Cancelar</button>");
    $("#frmCobros").append("<input type='text' id='idEdit' name='idEdit' hidden>");
    $("#btnAgregarCobro").hide();
    $("#cob_nivel").attr("disabled","disabled");
    $.ajax({
        url	    : 'ajax/cobros.ajax.php',
        type    : 'POST',
        data    : {idCobro:idCobro},
        dataType:   "json",
        success: function(data){
            $("#idEdit").val(data.idCobros);
            $("#cod_pago").val(data.codigo);
            $("#detalle_pago").val(data.detalle);
            $("#fecha_vencimiento").val(data.fecha_vencimiento);
            $("#monto").val(data.monto);
            $("#cob_nivel").val(data.cob_nivel);
        
        }
    }); 
}
function cancelar() { 
    $("#frmCobros")[0].reset();
    $("#btnActualizar").remove();
    $("#btnCancelar").remove();
    $("#btnAgregarCobro").show();
    $("#cob_nivel").removeAttr("disabled");
};

function editarCobro(id){
    $("#btnActualizar").remove();
    $("#btnCancelar").remove();
    $("#idEdit").remove();
    pasarDatos(id);
    
}


function editCobro(){
    var id_editCobro = $("#idEdit").val();
    var cod_editpago = $("#cod_pago").val();
    var detalle_pago = $("#detalle_pago").val();
    var fecha_vencimiento = $("#fecha_vencimiento").val();
    var monto =$("#monto").val();
    var cob_niveles = cob_nivel.options[cob_nivel.selectedIndex].value;
    $.ajax({
        url	    : 'ajax/cobros.ajax.php',
        type    : 'POST',
        data    : {id_editCobro:id_editCobro,
                    cod_editpago : cod_editpago,
                    detalle_pago:detalle_pago,
                    fecha_vencimiento : fecha_vencimiento,
                    monto:monto,
                    cob_niveles:cob_niveles},
        success: function(data){
            if(data == "ok"){
                swal.fire({
                    icon:"success",
                    title : "Cobro Actualizado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "El cobro no ha sido actualizado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            $("#btnActualizar").remove();
            $("#btnCancelar").remove();
            $("#btnAgregarCobro").show();
            $("#idEdit").remove();
            $("#frmCobros")[0].reset();
            mostrarCobros();
            $("#cob_nivel").removeAttr("disabled");
        
        }
    });
}

function eliminarCobro(id){
    var eliminarID= id;
    Swal.fire({
        title: 'Realmente desea eliminar el cobro?',
        showDenyButton: true,
        
        confirmButtonText: `Sí, eliminar`,
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "ajax/cobros.ajax.php",
                data: {eliminarID : eliminarID},
                success: function (data) {
                    if(data = "ok"){
                        Swal.fire('Se eliminó correctamente el cobro', '');
                    }
                    
                    mostrarCobros();
                    cancelar();
                }
            });
            
    }
    else if (result.isDenied) {
        Swal.fire('No se guardaron los cambios', '', '');
      }
    })

}
