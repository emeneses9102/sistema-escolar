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