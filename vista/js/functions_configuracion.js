$('#tableconfPasarela').DataTable();

document.addEventListener('DOMContentLoaded',function(){
  tableconfPasarela = $('#tableconfPasarela').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": true,
        "info":false,
        "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
        "pageLength": 20,
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

$("#addCuenta").click(function (e) { 
  e.preventDefault();
  let cuenta=$("#nueva_cuenta").val();
  let titular_cuenta=$("#titular_cuenta").val();
  let cci_cuenta=$("#numero_CCI").val();
  let banco_cuenta=$("#nombre_banco").val();
  let cuenta_antigua=$("#cuentaAntigua").val();
  if(cuenta == ""){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else if(cuenta.length >= 20){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else{
    $.ajax({
      url	    : 'ajax/institucion.ajax.php',
      type    : 'POST',
      data    : {cuenta:cuenta,
                titular_cuenta:titular_cuenta,
                cci_cuenta:cci_cuenta,
                banco_cuenta:banco_cuenta,
                cuenta_antigua:cuenta_antigua},
      success: function (respuesta) {
        if(respuesta == "ok")
        {
          let actualizar = "actualizar"
          $.ajax({
            type: "POST",
            url: "ajax/institucion.ajax.php",
            data: {actualizarCuenta:actualizar},
            dataType: "json",
            success: function (data) {
              $.notify({
                title: "<strong>Registro Exitoso:</strong>",
                message: "El número de cuenta ha sido registrado",
                icon:"fa fa-exclamation-circle"
              },{
                type: 'success',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                placement: {
                  from: "top",
                  align: "right"
                },
              }
              );
              var tabla = $("#tableconfPasarela").DataTable();
              tabla.clear().draw();
              for(let item of data){             
                  tabla.row.add(
                      [
                  "<td>"+item.nombre_banco+"</td>",
                  "<td>"+item.numero_cuenta+"</td>",           
                  "<td>"+item.cci_cuenta+"</td>",
                  "<td>"+item.titular_cuenta+"</td>",
                  "<td><button type='button' class='btn btn-warning btn-sm' onclick='sendCuenta("+item.idCuentas+")'>Editar</button></td>",
                  ]
                  ).draw(false);
              }
              resetearcta();
            }
          });
        }
      }
    });
  }
  
});

$("#updateCuenta").on("click",function (e) { 
  
  e.preventDefault();
  let cuenta=$("#nueva_cuenta").val();
  let titular_cuenta=$("#titular_cuenta").val();
  let cci_cuenta=$("#numero_CCI").val();
  let banco_cuenta=$("#nombre_banco").val();
  let cuenta_antigua=$("#cuentaAntigua").val();
  if(cuenta == ""){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else if(cuenta.length >= 20){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else{
    $.ajax({
      url	    : 'ajax/institucion.ajax.php',
      type    : 'POST',
      data    : {cuenta:cuenta,
                titular_cuenta:titular_cuenta,
                cci_cuenta:cci_cuenta,
                banco_cuenta:banco_cuenta,
                cuenta_antigua:cuenta_antigua},
      success: function (respuesta) {
        if(respuesta == "ok")
      {
        let actualizar = "actualizar"
        $.ajax({
          type: "POST",
          url: "ajax/institucion.ajax.php",
          data: {actualizarCuenta:actualizar},
          dataType: "json",
          success: function (data) {
            $.notify({
              title: "<strong>Actualización Exitosa:</strong>",
              message: "El número de cuenta ha sido actualizado",
              icon:"fa fa-exclamation-circle"
            },{
              type: 'success',
              position: null,
              type: "info",
              allow_dismiss: true,
              newest_on_top: false,
              showProgressbar: false,
              offset: 20,
              spacing: 10,
              z_index: 1031,
              delay: 5000,
              timer: 1000,
              placement: {
                from: "top",
                align: "right"
              },
            }
            );
            var tabla = $("#tableconfPasarela").DataTable();
              tabla.clear().draw();
              for(let item of data){             
                  tabla.row.add(
                      [
                  "<td>"+item.nombre_banco+"</td>",
                  "<td>"+item.numero_cuenta+"</td>",           
                  "<td>"+item.cci_cuenta+"</td>",
                  "<td>"+item.titular_cuenta+"</td>",
                  "<td><button type='button' class='btn btn-warning btn-sm' onclick='sendCuenta("+item.idCuentas+")'>Editar</button></td>",
                  ]
                  ).draw(false);
              }
              resetearcta();
          }
        });
      }
      }
    });
  }
});

$("#deleteCuenta").on("click",function(e){
  e.preventDefault();
  let cuenta=$("#nueva_cuenta").val();
  let cuenta_antigua=$("#cuentaAntigua").val();
  if(cuenta == ""){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else if(cuenta.length >= 20){
    $("#nueva_cuenta").addClass("is-invalid");
  }
  else{
    $.ajax({
      url	    : 'ajax/institucion.ajax.php',
      type    : 'POST',
      data    : {dCuenta:cuenta_antigua},
      success: function (respuesta) {
        if(respuesta == "ok")
      {
        let actualizar = "actualizar"
        $.ajax({
          type: "POST",
          url: "ajax/institucion.ajax.php",
          data: {actualizarCuenta:actualizar},
          dataType: "json",
          success: function (data) {
            $.notify({
              title: "<strong>Cuenta Eliminada:</strong>",
              message: "El número de cuenta ha sido eliminado",
              icon:"fa fa-exclamation-circle"
            },{
              type: 'danger',
              position: null,
              type: "info",
              allow_dismiss: true,
              newest_on_top: false,
              showProgressbar: false,
              offset: 20,
              spacing: 10,
              z_index: 1031,
              delay: 5000,
              timer: 1000,
              placement: {
                from: "top",
                align: "right"
              },
            }
            );
            var tabla = $("#tableconfPasarela").DataTable();
              tabla.clear().draw();
              for(let item of data){             
                  tabla.row.add(
                      [
                  "<td>"+item.nombre_banco+"</td>",
                  "<td>"+item.numero_cuenta+"</td>",           
                  "<td>"+item.cci_cuenta+"</td>",
                  "<td>"+item.titular_cuenta+"</td>",
                  "<td><button type='button' class='btn btn-warning btn-sm' onclick='sendCuenta("+item.idCuentas+")'>Editar</button></td>",
                  ]
                  ).draw(false);
              }
              resetearcta();
              
          }
        });
      }
      }
    });
  }
})

$("#cancelarCTA").click(function (e) { 
  e.preventDefault();
  resetearcta();
});

$("#btnCulqi").click(function (e) {
  e.preventDefault();
  let titulo =$("#titulo_culqui").val();
  let llave = $("#llave_culqui").val();
  let llave_publica = $("#llave_publica").val();
  let comision_culqi = $("#comision_culqi").val();
  $.ajax({
    type: "POST",
    url: "ajax/institucion.ajax.php",
    data: {titulo:titulo,
            llave:llave,
            llave_publica:llave_publica,
            comision_culqi:comision_culqi},
    success: function (rpta) {
      if(rpta=="ok"){
        $.notify({
          title: "<strong>Datos Culqi: </strong>",
          message: "Se guardaron los datos exitosamente",
          icon:"fa fa-exclamation-circle"
        },{
          type: 'success',
          position: null,
          type: "info",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          placement: {
            from: "top",
            align: "right"
          },
        }
        );
      }
    }
  });
})

$("#btnPaypal").click(function (e) {
  e.preventDefault();
  let titulo_paypal= $("#titulo_paypal").val();
  let url_paypal= $("#url_paypal").val();
  let comision_paypal= $("#comision_paypal").val();
  $.ajax({
    type: "POST",
    url: "ajax/institucion.ajax.php",
    data: {titulo_paypal:titulo_paypal,
            url_paypal:url_paypal,
            comision_paypal:comision_paypal},
    success: function (rpta) {
      if(rpta=="ok"){
        $.notify({
          title: "<strong>Datos Paypal: </strong>",
          message: "Se guardaron los datos exitosamente",
          icon:"fa fa-exclamation-circle"
        },{
          type: 'success',
          position: null,
          type: "info",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          placement: {
            from: "top",
            align: "right"
          },
        }
        );
      }
    }
  });
})

function sendCuenta(id){
  $("#addCuenta").hide();
  $("#deleteCuenta").show();
  $.ajax({
    url	    : 'ajax/institucion.ajax.php',
    type    : 'POST',
    data    : {idCuenta:id},
    dataType: "json",
    success: function (cuenta) {

      $("#nueva_cuenta").val(cuenta.numero_cuenta);
      $("#titular_cuenta").val(cuenta.titular_cuenta);
      $("#numero_CCI").val(cuenta.cci_cuenta);
      $("#nombre_banco").val(cuenta.nombre_banco);
      $("#cuentaAntigua").val(cuenta.idCuentas)
      $("#updateCuenta").show();
    }
  })
  
}

function resetearcta(){
  $("#nueva_cuenta").val("");
  $("#titular_cuenta").val("");
  $("#numero_CCI").val("");
  $("#nombre_banco").val("");
  $("#cuentaAntigua").val("");
  $("#updateCuenta").hide();
  $("#addCuenta").show();
  $("#deleteCuenta").hide();
}

function estadoCulqi(e){ 
  $.ajax({
    type: "POST",
    url: "ajax/institucion.ajax.php",
    data: {estadoCulqi:e,},
    success: function (rpta) {
      if(rpta=="ok"){
        $.notify({
          title: "<strong>Datos Culqi: </strong>",
          message: "Se cambio el estado",
          icon:"fa fa-exclamation-circle"
        },{
          type: 'success',
          position: null,
          type: "info",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          placement: {
            from: "top",
            align: "right"
          },
        }
        );
      }
    }
  });
}

function estadoPaypal(e){ 
  $.ajax({
    type: "POST",
    url: "ajax/institucion.ajax.php",
    data: {estadoPaypal:e,},
    success: function (rpta) {
      if(rpta=="ok"){
        $.notify({
          title: "<strong>Datos Paypal: </strong>",
          message: "Se cambio el estado",
          icon:"fa fa-exclamation-circle"
        },{
          type: 'success',
          position: null,
          type: "info",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          placement: {
            from: "top",
            align: "right"
          },
        }
        );
      }
    }
  });
}