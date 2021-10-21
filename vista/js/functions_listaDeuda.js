$('#tablaDeudas').DataTable();



document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablaDeudas').DataTable({
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

$("#nivelesD").change(function (e) { 
    var idNivelD = nivelesD.options[nivelesD.selectedIndex].value;
    
    if(idNivelD !=""){
        $("#GradosD").val("");
        $("#mesesD").val("");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {idNivelD:idNivelD},
            dataType:   "json",
            success: function(data){
                var tabla = $("#tablaDeudas").DataTable();
                tabla.clear().draw();
                for(let item of data){
                    
                    
                    tabla.row.add(
                        [
                    "<td><button class='btn btn-primary btn-sm mt-1' title='Editar Pago' id='editPago' name ='"+item.usuario_id+"' onclick='editarPago("+item.usuario_id+")'><i class='fas fa-user-edit'></i></button></td>",
                    "<td>"+item.nombres+"</td>",
                    "<td>"+item.apellidos+"</td>",           
                    "<td>"+item.dni+"</td>",
                    "<td>"+item.celular+"</td>",
                    "<td>"+item.correo+"</td>",
                    "<td>"+item.nombre_grado+"</td>",
                    "<td>"+item.pagos+" de "+item.conteo+"</td>",
                    ]
                    ).draw(false);
                    
                }
                
            
            }
        }); 
    }
   
    
});

$("#GradosD").change(function (e) { 
    var idGradoD = GradosD.options[GradosD.selectedIndex].value;
    
    if(idGradoD !=""){
        $("#nivelesD").val("");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {idGradoD:idGradoD},
            dataType:   "json",
            success: function(data){
                var tabla = $("#tablaDeudas").DataTable();
                tabla.clear().draw();
                for(let item of data){
                    
                    
                    tabla.row.add(
                        [
                    "<td><button class='btn btn-primary btn-sm mt-1' title='Editar Pago' id='editPago' name ='"+item.usuario_id+"' onclick='editarPago("+item.usuario_id+")'><i class='fas fa-user-edit'></i></button></td>",
                    "<td>"+item.nombres+"</td>",
                    "<td>"+item.apellidos+"</td>",           
                    "<td>"+item.dni+"</td>",
                    "<td>"+item.celular+"</td>",
                    "<td>"+item.correo+"</td>",
                    "<td>"+item.nombre_grado+"</td>",
                    "<td>"+item.pagos+" de "+item.conteo+"</td>",
                    ]
                    ).draw(false);
                    
                }
                
            
            }
        }); 
    }
   
    
});

$("#mesesD").change(function (e) { 
    var idmesesD = mesesD.options[mesesD.selectedIndex].value;
    
    if(idmesesD !=""){
        $("#nivelesD").val("");
        $("#GradosD").val("");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {idmesesD:idmesesD},
            dataType:   "json",
            success: function(data){
                var tabla = $("#tablaDeudas").DataTable();
                tabla.clear().draw();
                for(let item of data){
                    
                    
                    tabla.row.add(
                        [
                    "<td><button class='btn btn-primary btn-sm mt-1' title='Editar Pago' id='editPago' name ='"+item.usuario_id+"' onclick='editarPago("+item.usuario_id+")'><i class='fas fa-user-edit'></i></button></td>",
                    "<td>"+item.nombres+"</td>",
                    "<td>"+item.apellidos+"</td>",           
                    "<td>"+item.dni+"</td>",
                    "<td>"+item.celular+"</td>",
                    "<td>"+item.correo+"</td>",
                    "<td>"+item.nombre_grado+"</td>",
                    "<td>"+item.pagos+" de "+item.conteo+"</td>",
                    ]
                    ).draw(false);
                    
                }
                
            
            }
        }); 
    }
   
    
});

function buscarxApellido(){
    var apellidoD = $("#txtApellidoD").val();
    if(apellidoD !=""){
        $("#nivelesD").val("");
        $("#GradosD").val("");
        $("#mesesD").val("");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {apellidoD:apellidoD},
            dataType:   "json",
            success: function(data){
                var tabla = $("#tablaDeudas").DataTable();
                tabla.clear().draw();
                for(let item of data){
                    
                    
                    tabla.row.add(
                        [
                    "<td><button class='btn btn-primary btn-sm mt-1' title='Editar Pago' id='editPago' name ='"+item.usuario_id+"' onclick='editarPago("+item.usuario_id+")'><i class='fas fa-user-edit'></i></button></td>",
                    "<td>"+item.nombres+"</td>",
                    "<td>"+item.apellidos+"</td>",           
                    "<td>"+item.dni+"</td>",
                    "<td>"+item.celular+"</td>",
                    "<td>"+item.correo+"</td>",
                    "<td>"+item.nombre_grado+"</td>",
                    "<td>"+item.pagos+" de "+item.conteo+"</td>",
                    ]
                    ).draw(false);
                    
                }
                
            
            }
        }); 
    }
}

$("#cmbApoderado").change(function (e) { 
    var idApoderado = cmbApoderado.options[cmbApoderado.selectedIndex].value;
    if(idApoderado !=""){
        $.ajax({
            url	    : 'ajax/datosApoderado.ajax.php',
            type    : 'POST',
            data    : {idApoderado : idApoderado},
            dataType: 'json',
            success: function(data){
            $('#nombresapoderado').val(data.nombres_apoderado+' '+data.apellidos_apoderado);
            $('#dniapoderado').val(data.dni_apoderado);
            $('#correoapoderado').val(data.correo_apoderado);
            }
        })
    }
});

$("#MailGenerarComprobante").on('submit', function (e) { 
    e.preventDefault();
    let id_DeudorR= $("#id_deuda").val();
    let correoAp= $("#correoapoderado").val();
    var formData = new FormData($("#MailGenerarComprobante").get(0));
    $.ajax({
        type: 'POST',
        url: 'ajax/listaDeuda.ajax.php',
        data: formData,
        contentType: false,
        processData:false,
        success: function (respuesta) {
            if(respuesta == "ok"){
                if(correoAp == ''){
                    swal.fire({
                        icon: "success",
                        title: "Comprobante Registrado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                }else{
                    swal.fire({
                        icon: "success",
                        title: "Comprobante enviado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                }
                
                $("#MailGenerarComprobante")[0].reset();
                $('#modalGenerarComprobante').modal('hide')
                $.ajax({
                    url	    : 'ajax/listaDeuda.ajax.php',
                    type    : 'POST',
                    data    : {id_deudaPago:id_DeudorR},
                    dataType:   "json",
                    success: function(data){
                        var tabla = $("#tablaDeudoresPagados").DataTable();
                        tabla.clear().draw();
                        for(let item of data){
                            enviado = (item.enviado == 1) ? "<span class='badge badge-success'>Enviado</span>": "<span class='badge badge-warning'>Sin enviar</span>"
                            
                            tabla.row.add(
                                [
                            "<td>"+item.codigo+"</td>",
                            "<td>"+item.detalle+"</td>",           
                            "<td>"+item.fecha_pago+"</td>",
                            "<td>"+item.tipo_pago+"</td>",
                            "<td>"+item.banco+"</td>",
                            "<td>"+item.monto_pagado+"</td>",
                            "<td><button type='button' class='btn btn-info btn-sm px-1' onclick='detallesPago("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-search-plus mx-1'></i></button><button type='button' class='btn btn-primary btn-sm px-1 ml-2' onclick='GenerarComprobante("+item.idAlumno_cobros+")' title='Generar comprobante'><i class='fas fa-file-invoice-dollar mx-1'></i></button></td>",
                            "<td>"+enviado+"</td>",
                            ]
                            ).draw(false);
                            
                        }
                        
                    
                    }
                });
                
            }else if(respuesta == "Error"){
                swal.fire({
                    icon: "Error",
                    title: "Error al enviar el comprobante",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })
            }else if(respuesta == "ErrorBD"){
                swal.fire({
                    icon: "Error",
                    title: "Error guardar la imagen en la BD",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })
            }
        }
    })
});