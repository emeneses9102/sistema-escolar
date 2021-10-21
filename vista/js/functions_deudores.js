$("#editarDeuda").hide();
$('#tablaDeudores').DataTable();
$('#table_pagosRealizados').DataTable();
$('#table_pagosPendientes').DataTable();

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablaDeudores').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
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
        "order": [[2,"asc"]]
    });
    table_pagosRealizados = $('#table_pagosRealizados').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
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
        "order": [[ 2, "asc" ]],
    });
    table_pagosPendientes = $('#table_pagosPendientes').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
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
        "order": [[2,"asc"]],
        //"ordering": false
    });
    table_pagosPendientes = $('#tablaDeudoresPagados').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": false,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
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
        "order": [[2,"asc"]],
        //"ordering": false
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
    //$("#nombreAlumno").text(valores[1]);
    //$("#apoderadoAlum").text(valores[3]); 
    /*$("#detalle_").text(valores[5]);
    $("#documento_").text(valores[2]);
    $("#nameApoderado_").text(valores[6]);
    $("#nameApoderado2_").text(valores[7]);
    $("#nameApoderado3_").text(valores[8]);*/
     let id_deuda=$(this).attr("name"); 

     //Datos
     $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_datos:id_deuda},
        dataType:   "json",
        success: function(data){
            $("#nivelAlumno").text(data.nombre_nivel); 
            $("#gradoAlumno").text(data.nombre_grado); 
            $("#nombreAlumno").text(data.NombreCompleto); 
            $("#documento_").text(data.dni); 
            $("#correo_").text(data.correo);
            $("#telAlumno").text(data.celular);
            $("#padre_").text(data.NombrePadre);
            $("#dniPadre_").text(data.dni_padre);
            $("#correoPadre_").text(data.correo_padre);
            $("#celularPadre_").text(data.telefono_padre);
            $("#madre_").text(data.NombreMadre);
            $("#dniMadre_").text(data.dni_madre);
            $("#correoMadre_").text(data.correo_madre);
            $("#celularMadre_").text(data.telefono_madre);
            $("#apoderado_").text(data.NombreApoderado);
            $("#dniApoderado_").text(data.dni_apoderado);
            $("#correoApoderado_").text(data.correo_apoderado);
            $("#celularApoderado_").text(data.telefono_apoderado);
        }
    });


    $("#id_deuda").val(id_deuda);
     $.ajax({
        url	    : 'ajax/listaDeuda.ajax.php',
        type    : 'POST',
        data    : {id_deuda:id_deuda},
        dataType:   "json",
        success: function(data){
            
            var tabla = $("#tablaDeudores").DataTable();
            tabla.clear().draw();
            var estado = "";
            for(let item of data){
                estado = (item.comprobanteURL != null)?"<span class='badge badge-success'>Recibido</span>":"<span class='badge badge-warning'>Sin comprobante</span>";
                
                tabla.row.add(
                    [
                "<td>"+item.codigo+"</td>",
                "<td>"+item.detalle+"</td>",           
                "<td>"+item.fecha_vencimiento+"</td>",
                "<td>"+item.monto+"</td>",
                "<td style='width: 100px;' ><span id='lblMontoCobrar"+item.idAlumno_cobros+"'>"+item.montoCobrar+"</span><input id='txtMontoCobrar"+item.idAlumno_cobros+"' value="+item.montoCobrar+" class='form-control-sm text-right d-none' id='monto"+item.idAlumno_cobros+"'></td>",
                "<td>"+estado+"</td>",
                "<td><button id='change"+item.idAlumno_cobros+"' type='button' class='btn btn-warning btn-sm px-1 mr-2' onclick='change("+item.idAlumno_cobros+")' title='Editar Pago'><i class='fas fa-pencil-alt'></i></button><button type='button' id='btnMontoCobrar"+item.idAlumno_cobros+"' class='btn btn-warning btn-sm px-1 mr-2 d-none' onclick='EditarPago("+item.idAlumno_cobros+")' title='Guardar Pago'><i class='fas fa-save'></i><button type='button' class='btn btn-info btn-sm px-1 mr-2' onclick='detallesPagoOjo("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-search-plus'></i></button></button><button type='button' class='btn btn-danger btn-sm px-1' onclick='exonerarCobro("+item.idAlumno_cobros+")' title='Exonerar Pago'><i class='fas fa-trash'></i></button></td>",
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
                enviado = (item.enviado == 1) ? "<span class='badge badge-success'>Enviado</span>": "<span class='badge badge-warning'>Sin enviar</span>"
                
                tabla.row.add(
                    [
                "<td>"+item.codigo+"</td>",
                "<td>"+item.detalle+"</td>",           
                "<td>"+item.fecha_pago+"</td>",
                "<td>"+item.tipo_pago+"</td>",
                "<td>"+item.banco+"</td>",
                "<td>"+item.monto_pagado+"</td>",
                "<td><button type='button' class='btn btn-info btn-sm px-1' onclick='detallesPago("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-hand-holding-usd mx-1'></i></button><button type='button' class='btn btn-primary btn-sm px-1 ml-2' onclick='GenerarComprobante("+item.idAlumno_cobros+")' title='Generar comprobante'><i class='fas fa-file-invoice-dollar mx-1'></i></button></td>",
                "<td>"+enviado+"</td>",
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
            $("#pdfCompleto2").removeClass("d-none");
            $("#pdfDelPago").removeClass("d-none");
            for(let item of data){
                if(item.idAlumno_cobros == i){
                    $('#detalleDelPago').text(item.detalle);
                    $('#fechaDelPago').text(item.fecha_pago);
                    $('#montoDelPago').text(item.monto_pagado);
                    $('#medioDelPago').text(item.tipo_pago);
                    $('#comentariosPago').text(item.comentarios);

                    var cadena = item.comprobanteURL+"";
                    var extension = ".pdf";
                    var index = cadena.indexOf(extension);
                    if(index >= 0) {
	                    var elemento = document.getElementById("imagenDelPago");
                        elemento.className += " d-none";
                        $("#pdfCompleto2").removeClass("d-none");
                        document.getElementById('pdfCompleto2').setAttribute('href', item.comprobanteURL+'');
                        $("#pdfDelPago").addClass("d-none");
                        //$("#pdfDelPago").attr("src",item.comprobanteURL);
                        
                    }else{
                    var elemento = document.getElementById("pdfDelPago");
                    var elemento2 = document.getElementById("pdfCompleto2");
                    elemento.className += "d-none";
                    elemento2.className += " d-none";
                    $("#imagenDelPago").removeClass("d-none");
                    $("#imagenDelPago").attr("src",item.comprobanteURL);
                    $("#hrefImagenDetalle").attr("href",item.comprobanteURL);
                    }
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
                    $('#montoDelPago1').text(item.montoCobrar);
                    $('#medioDelPago1').text(item.tipo_pago);
                    $('#comentariosPago1').text(item.comentarios);
                    var cadena = item.comprobanteURL+"";
                    console.log(item.comprobanteURL+"");

                    var extension = ".pdf";
                    var index = cadena.indexOf(extension);
                    console.log(index+"");

                    if(index != -1) {
                        var elemento = document.getElementById("imagenDelPago1");
                        elemento.className += " d-none";
                        $("#pdfDelPago1").removeClass("d-none");
                        $("#pdfDelPago1").attr("src",item.comprobanteURL);
                        $("#pdfCompleto").removeClass("d-none");
                        document.getElementById('pdfCompleto').setAttribute('href', item.comprobanteURL+'');

                    }else{

                        var elemento = document.getElementById("pdfDelPago1");
                        var elemento2 = document.getElementById("pdfCompleto");
                        elemento.className += " d-none";
                        elemento2.className += " d-none";
                        $("#imagenDelPago1").removeClass("d-none");
                        $("#imagenDelPago1").attr("src",item.comprobanteURL);
                        $("#hrefImagenDetalle1").attr("href",item.comprobanteURL);
                    
                    }

                    $('#validarpagoname').val(item.idAlumno_cobros);
                    
                }
            }
        }
    });
}
function change(x){

    $("#txtMontoCobrar"+x).removeClass("d-none");
    $("#lblMontoCobrar"+x).addClass("d-none");
    $("#btnMontoCobrar"+x).removeClass("d-none");
    $('#change'+x).addClass("d-none");
}
function dnone(x){
    $("#txtMontoCobrar"+x).addClass("d-none");
    $("#lblMontoCobrar"+x).removeClass("d-none");
    $("#btnMontoCobrar"+x).addClass("d-none");
    $('#change'+x).removeClass("d-none");
}
function EditarPago(idCobro_){
    
    var idCobro_ = idCobro_;
    
    var monto= $("#txtMontoCobrar"+idCobro_).val();


    
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
                $("#lblMontoCobrar"+idCobro_).text(monto);
                dnone(idCobro_);
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
                .then(() => {
                    $('#modalDetallePago').modal('hide')
                    $("#id_deuda").val(id_deuda);
                    $.ajax({
                        url	    : 'ajax/listaDeuda.ajax.php',
                        type    : 'POST',
                        data    : {id_deuda:id_deuda},
                        dataType:   "json",
                        success: function(data){
                            var tabla = $("#tablaDeudores").DataTable();
                            tabla.clear().draw();
                            var estado = "";
                            for(let item of data){
                                estado = (item.comprobanteURL != null)?"<span class='badge badge-success'>Recibido</span>":"<span class='badge badge-warning'>Sin comprobante</span>";
                                
                                tabla.row.add(
                                    [
                                "<td>"+item.codigo+"</td>",
                                "<td>"+item.detalle+"</td>",           
                                "<td>"+item.fecha_vencimiento+"</td>",
                                "<td>"+item.monto+"</td>",
                                "<td style='width: 100px;' ><span id='lblMontoCobrar"+item.idAlumno_cobros+"'>"+item.montoCobrar+"</span><input id='txtMontoCobrar"+item.idAlumno_cobros+"' value="+item.montoCobrar+" class='form-control-sm text-right d-none' id='monto"+item.idAlumno_cobros+"'></td>",
                                "<td>"+estado+"</td>",
                                "<td><button id='change"+item.idAlumno_cobros+"' type='button' class='btn btn-warning btn-sm px-1 mr-2' onclick='change("+item.idAlumno_cobros+")' title='Editar Pago'><i class='fas fa-pencil-alt'></i></button><button type='button' id='btnMontoCobrar"+item.idAlumno_cobros+"' class='btn btn-warning btn-sm px-1 mr-2 d-none' onclick='EditarPago("+item.idAlumno_cobros+")' title='Guardar Pago'><i class='fas fa-save'></i><button type='button' class='btn btn-info btn-sm px-1 mr-2' onclick='detallesPagoOjo("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-search-plus'></i></button></button><button type='button' class='btn btn-danger btn-sm px-1' onclick='exonerarCobro("+item.idAlumno_cobros+")' title='Exonerar Pago'><i class='fas fa-trash'></i></button></td>",
                                ]
                                ).draw(false);
                                
                            }
                        }
                    }); 
                    let id_DeudorR= $("#id_deuda").val();
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
                                "<td><button type='button' class='btn btn-info btn-sm px-1' onclick='detallesPago("+item.idAlumno_cobros+")' title='Ver detalles'><i class='fas fa-hand-holding-usd mx-1'></i></button><button type='button' class='btn btn-primary btn-sm px-1 ml-2' onclick='GenerarComprobante("+item.idAlumno_cobros+")' title='Generar comprobante'><i class='fas fa-file-invoice-dollar mx-1'></i></button></td>",
                                "<td>"+enviado+"</td>",
                                ]
                                ).draw(false);
                                
                            }
                            
                        
                        }
                    });
                });
               
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
                .then(() => {
                    window.location = "listaDeuda"; 
                });
                
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

function GenerarComprobante(i){
    var id_deuda = $("#id_deuda").val();
    console.log(id_deuda+"");
    $("#modalGenerarComprobante").modal("show");
   $.ajax({
        url	    : 'ajax/datosApoderado.ajax.php',
        type    : 'POST',
        data    : {id_deudaPagoDatos:id_deuda},
        dataType:   "json",
        success: function(data){
            $("#pdfCompleto3").removeClass("d-none");
            $("#pdfDelComprobante").removeClass("d-none");
            for(let item of data){
                if(item.idAlumno_cobros == i){
                    $('#idalumnocobroscomprobante').val(item.idAlumno_cobros);
                    //$('#nombresapoderado').val(item.nombres_apoderado+' '+item.apellidos_apoderado);
                    //$('#dniapoderado').val(item.dni_apoderado);
                    $('#detallemensualidad').val(item.detalle);
                    $('#montomensualidad').val(item.monto_pagado);
                    //$('#correoapoderado').val(item.correo_apoderado);
                    $('#correoapoderado').val(item.correo);
                    $("#cmbApoderado").empty();
                    $("#cmbApoderado").append('<option></option>');
                    if(item.id_apoderado != null){$("#cmbApoderado").append('<option value='+item.id_apoderado+'>'+item.nombres_apoderado+' '+item.apellidos_apoderado+'</option>');}
                    if(item.id_apoderado2 != null){$("#cmbApoderado").append('<option value='+item.id_apoderado2+'>'+item.nombres_apoderado2+' '+item.apellidos_apoderado2+'</option>');}
                    if(item.id_apoderado3 != null && item.id_apoderado3 != "" ){$("#cmbApoderado").append('<option value='+item.id_apoderado3+'>'+item.nombres_apoderado3+' '+item.apellidos_apoderado3+'</option>');}
                    var cadena = item.comprobantegeneradoURL+"";
                    var extension = ".pdf";
                    var index = cadena.indexOf(extension);
                    if(index >= 0) {
	                    var elemento = document.getElementById("imagenDelComprobante");
                        elemento.className += " d-none";
                        $("#pdfDelComprobante").addClass("d-none");
                        $("#pdfDelComprobante").attr("src",item.comprobantegeneradoURL);
                        $("#pdfCompleto3").removeClass("d-none");
                        document.getElementById('pdfCompleto3').setAttribute('href', item.comprobantegeneradoURL+'');
                    }else{
                    var elemento = document.getElementById("pdfDelComprobante");
                    var elemento2 = document.getElementById("pdfCompleto3");
                    elemento.className += " d-none";
                    elemento2.className += " d-none";
                    $("#imagenDelComprobante").removeClass("d-none");
                    $("#imagenDelComprobante").attr("src",item.comprobantegeneradoURL);
                    $("#hrefImagenDelComprobante").attr("href",item.comprobantegeneradoURL);
                    }

                }
            }
            
        
        }
    });
}
function mostrarDatosApoderado(){
    var idPago = $("#idPago").val();
    console.log(idPago+"hola");
    $.ajax({
        url	    : 'ajax/pagosPendientes.ajax.php',
        type    : 'POST',
        data    : {id_PagoAlumnoCobros:idPago},
        dataType:   "json",
        success: function(data){
            console.log(data);
            console.log("no funciona");
                    $('#alumnocobro_nombreapellido').val(data.nombres+' '+data.apellidos);
                    $('#alumnocobro_codmatricula').val(data.cod_matricula);
                    $('#alumnocobro_detalle').val(data.detalle);
                    $('#alumnocobro_gradoseccion').val(data.nombre_grado+' - '+data.nombre_seccion);
                    $('#dniCodigoPago').val(data.dni);
        }
    });
    console.log("maldicion");
    }

    function detallesPagoAlumno(i){
        id_deuda = $("#id_deudaAlumno").val();
        $("#modalDetallePagoAlumno").modal("show");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {id_deudaPago:id_deuda},
            dataType:   "json",
            success: function(data){
                $("#pdfDelPagoAlumno").removeClass("d-none");
                $("#pdfCompleto2Alumno").removeClass("d-none");
                for(let item of data){
                    if(item.idAlumno_cobros == i){
                        $('#detalleDelPagoAlumno').text(item.detalle);
                        $('#fechaDelPagoAlumno').text(item.fecha_pago);
                        $('#montoDelPagoAlumno').text(item.monto_pagado);
                        $('#medioDelPagoAlumno').text(item.tipo_pago);
    
                        var cadena = item.comprobanteURL+"";
                        var extension = ".pdf";
                        var index = cadena.indexOf(extension);
                        if(index >= 0) {
                            var elemento = document.getElementById("imagenDelPagoAlumno");
                            elemento.className += " d-none";
                            $("#pdfDelPagoAlumno").addClass("d-none");
                            $("#pdfDelPagoAlumno").attr("src",item.comprobanteURL);
                            $("#pdfCompleto2Alumno").removeClass("d-none");
                            document.getElementById('pdfCompleto2Alumno').setAttribute('href', item.comprobanteURL+'');
                        }else{
                        var elemento = document.getElementById("pdfDelPagoAlumno");
                        var elemento2 = document.getElementById("pdfCompleto2Alumno");
                        elemento.className += "d-none";
                        elemento2.className += " d-none";
                        $("#imagenDelPagoAlumno").removeClass("d-none");
                        $("#imagenDelPagoAlumno").attr("src",item.comprobanteURL);
                        $("#hrefImagenDetalleAlumno").attr("href",item.comprobanteURL);
                        }
                    }
                }
                
            
            }
        });
    }

    function comprobantePagoAlumno(i){
        id_deuda = $("#id_deudaAlumno").val();
        $("#modalDetallePagoAlumno").modal("show");
        $.ajax({
            url	    : 'ajax/listaDeuda.ajax.php',
            type    : 'POST',
            data    : {id_deudaPago:id_deuda},
            dataType:   "json",
            success: function(data){
                $("#pdfDelPagoAlumno").removeClass("d-none");
                $("#pdfCompleto2Alumno").removeClass("d-none");
                for(let item of data){
                    if(item.idAlumno_cobros == i){
                        $('#detalleDelPagoAlumno').text(item.detalle);
                        $('#fechaDelPagoAlumno').text(item.fecha_pago);
                        $('#montoDelPagoAlumno').text(item.monto_pagado);
                        $('#medioDelPagoAlumno').text(item.tipo_pago);
    
                        var cadena = item.comprobantegeneradoURL+"";
                        var extension = ".pdf";
                        var index = cadena.indexOf(extension);
                        if(index >= 0) {
                            var elemento = document.getElementById("imagenDelPagoAlumno");
                            elemento.className += " d-none";
                            $("#pdfDelPagoAlumno").addClass("d-none");
                            $("#pdfDelPagoAlumno").attr("src",item.comprobantegeneradoURL);
                            $("#pdfCompleto2Alumno").removeClass("d-none");
                            document.getElementById('pdfCompleto2Alumno').setAttribute('href', item.comprobantegeneradoURL+'');
                        }else{
                        var elemento = document.getElementById("pdfDelPagoAlumno");
                        var elemento2 = document.getElementById("pdfCompleto2Alumno");
                        elemento.className += "d-none";
                        elemento2.className += " d-none";
                        $("#imagenDelPagoAlumno").removeClass("d-none");
                        $("#imagenDelPagoAlumno").attr("src",item.comprobantegeneradoURL);
                        $("#hrefImagenDetalleAlumno").attr("href",item.comprobantegeneradoURL);
                        }
                    }
                }
                
            
            }
        });
    }