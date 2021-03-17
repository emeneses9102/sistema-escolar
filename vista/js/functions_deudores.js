$("#editarDeuda").hide();
$('#tablaDeudores').DataTable();

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablaDeudores').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "info":false,
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
function editarPago(id){
    $("#listDeudores").hide();
    $("#editarDeuda").show();


}
$("#btnInfo").click(function (e) { 
    e.preventDefault();
    $("#editarDeuda").hide();
    $("#listDeudores").show();
});

$('#listDeudores').on('click', '#editPago', function(e) {
	
    var valores = new Array();
    i=0;
    $(".matID_Alumno").remove();
    $(this).parents("tr").find("td").each(function(){
       valores[i] =$(this).html();
        i++;
    });
    $("#nombreAlumno").text(valores[1]+" "+valores[2]);
    $("#apoderadoAlum").text(valores[3]); 
    $("#detalle_").text(valores[6]);
     let id_deuda=$(this).attr("name"); 

    $("#id_deuda").val(id_deuda);
     $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_deuda:id_deuda},
        dataType:   "json",
        success: function(data){
            var tabla = $("#tablaDeudores").DataTable();
            tabla.clear().draw();
            for(let item of data){
                
                
                tabla.row.add(
                    [
                "<td>"+item.codigo+"</td>",
                "<td>"+item.detalle+"</td>",           
                "<td>"+item.fecha_vencimiento+"</td>",
                "<td>"+item.monto+"</td>",
                "<td style='width: 100px;'><input value="+item.montoCobrar+" class='form-control text-right' id='monto"+item.idAlumno_cobros+"'></td>",
                "<td><button type='button' class='btn btn-warning btn-sm px-1 mr-2' onclick='EditarPago("+item.idAlumno_cobros+")' title='Editar Pago'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-danger btn-sm px-1 mr-2' onclick='exonerarCobro("+item.idAlumno_cobros+")' title='Exonerar Pago'><i class='fas fa-trash'></i></button><button type='button' class='btn btn-info btn-sm px-1 ' onclick='detallesPagoOjo("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-eye'></i></button></td>",
                ]
                ).draw(false);
                
            }
            
        
        }
    });
//Pagos realizados
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_deudaPago:id_deuda},
        dataType:   "json",
        success: function(data){
            var tabla = $("#tablaDeudoresPagados").DataTable();
            tabla.clear().draw();
            for(let item of data){
                
                
                tabla.row.add(
                    [
                "<td>"+item.codigo+"</td>",
                "<td>"+item.detalle+"</td>",           
                "<td>"+item.fecha_pago+"</td>",
                "<td>"+item.tipo_pago+"</td>",
                "<td>"+item.monto_pagado+"</td>",
                "<td><button type='button' class='btn btn-info btn-sm px-1 ' onclick='detallesPago("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-lightbulb mx-1'></i></button></td>",
                ]
                ).draw(false);
                
            }
            
        
        }
    });
    
    
});

function detallesPago(i){
    id_deuda = $("#id_deuda").val();
    $("#modalDetallePago").modal("show");
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_deudaPago:id_deuda},
        dataType:   "json",
        success: function(data){
            
            for(let item of data){
                if(item.idAlumno_cobros == i){
                    $('#detalleDelPago').text(item.detalle);
                    $('#fechaDelPago').text(item.fecha_pago);
                    $('#montoDelPago').text(item.monto_pagado);
                    $('#medioDelPago').text(item.tipo_pago);
                    $("#imagenDelPago").attr("src",item.comprobanteURL);
                    
                }
            }
            
        
        }
    });
}
function detallesPagoOjo(i){
    id_deuda = $("#id_deuda").val();
    $("#modalDetallePagoOjo").modal("show");
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_deudaPago1:id_deuda},
        dataType:   "json",
        success: function(data){
            
            for(let item of data){
                if(item.idAlumno_cobros == i){
                    $('#detalleDelPago1').text(item.detalle);
                    $('#fechaDelPago1').text(item.fecha_pago);
                    $('#montoDelPago1').text(item.monto_pagado);
                    $('#medioDelPago1').text(item.tipo_pago);
                    $("#imagenDelPago1").attr("src",item.comprobanteURL);
                    $('#validarpagoname').val(item.idAlumno_cobros);
                    
                }
            }
            
        
        }
    });
}
function EditarPago(idCobro_){
    var idCobro_ = idCobro_;

    var monto= $("#monto"+idCobro_).val();
    
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {idCobro_:idCobro_,
                    monto:monto},
        success: function(data){
            if(data = "ok"){
                swal.fire({
                    icon:"success",
                    title : "Cobro actualizado",
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
        }
    }); 
}

function exonerarCobro(id_cobro){
    var id_cobro = id_cobro;
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_cobro:id_cobro},
        success: function(data){
            alert(data);
            if(data == "ok"){
                swal.fire({
                    icon:"success",
                    title : "Cobro Exonerado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                window.location = "listaDeuda";
                
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "El cobro no ha sido exonerado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                
            }
        }
    }); 
}
function validarCobro(){
    var id_validaralumno = $("#validarpagoname").val();
    var validarpago = $("#montovalidarpago").val();
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {idAlumno_cobros:id_validaralumno, monto_pagado:validarpago},
        success: function(data){
            if(data == "ok"){
                swal.fire({
                    icon:"success",
                    title : "Pago validado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                window.location = "listaDeuda";
                
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "El pago no se ha validado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                
            }
        }
    }); 
}

function validarCobro2(){
    var id_validaralumno = $("#validarpagoname").val();
    $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {idAlumno_cobros2:id_validaralumno},
        success: function(data){
            if(data == "ok"){
                swal.fire({
                    icon:"success",
                    title : "Pago rechazado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                window.location = "listaDeuda";
                
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "Error",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                
            }
        }
    }); 
}