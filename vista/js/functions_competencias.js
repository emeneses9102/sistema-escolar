$('#tablaCompetencias').DataTable();
var tablaCompetencias;
document.addEventListener('DOMContentLoaded',function(){
    tablaCompetencias = $('#tablaCompetencias').DataTable({
      "aProcessing": true,
      "aServerSide": true,
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
var ID_Edit=""
$("#formCompetencias").on('submit', function(e){
    e.preventDefault();
    var $form = $(this);
    if($("#btnCompetencia").val() == "Actualizar"){
        var IDEditarCompetencia = ID_Edit
        var nombre_competencia1 = $("#nombre_competencia").val()
        var nombre_cortoCompetencia = $("#nombre_cortoCompetencia").val()
        var identificador_competencia =  $("#identificador_competencia").val()
        $.ajax({
            type: "POST",
            url: "ajax/competencias.ajax.php",
            data: {IDEditarCompetencia:IDEditarCompetencia,
                    nombre_competencia1:nombre_competencia1,
                    nombre_cortoCompetencia:nombre_cortoCompetencia,
                    identificador_competencia:identificador_competencia},
            success: function (respuesta) {
                if(respuesta == "repetido"){
                    swal.fire({
                        icon: "error",
                        title: "La competencia  ya existe",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
                if(respuesta == "ok"){
                    swal.fire({
                        icon: "success",
                        title: "Competencia editada exitosamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                    actualizar()
                    $("#formCompetencias")[0].reset();
                    
                }
                if(respuesta == "error"){
                    swal.fire({
                        icon: "error",
                        title: "Error al editar competencia",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
            }
        });
            
    }else{
        $.ajax({
            type: "POST",
            url: "ajax/competencias.ajax.php",
            data: $form.serialize(),
            success: function (respuesta) {
                if(respuesta == "repetido"){
                    swal.fire({
                        icon: "error",
                        title: "La competencia  ya existe",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
                if(respuesta == "ok"){
                    swal.fire({
                        icon: "success",
                        title: "Competencia creada exitosamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                    actualizar()
                    $("#formCompetencias")[0].reset();
                    
                }
                if(respuesta == "error"){
                    swal.fire({
                        icon: "error",
                        title: "Error al agregar competencia",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
            }
        });
    }
    
    
})

function actualizar(){
    var mostrar = ""
    $.ajax({
        type: "POST",
        url: "ajax/competencias.ajax.php",
        data: {mostrar : mostrar},
        dataType: "json",
        success: function (data) {
            var tabla = $("#tablaCompetencias").DataTable();
            tabla.clear().draw();
            for(let item of data){
                tabla.row.add(
                    [
                "<td><button type='button' class='btn btn-primary btn-sm mt-1 ' onclick='editarCompetencia("+item.idCompetencia+")' title='Editar' ><i class='fas fa-edit'></i></button><button type='button' class='btn btn-danger btn-sm mt-1 ml-1 ' onclick='eliminarCompetencia("+item.idCompetencia+")' title='Eliminar'><i class='fas fa-trash-alt'></i></button></td>",
                "<td>"+item.identificadorCompetencia+"</td>",
                "<td>"+item.nombreCompetencia+"</td>",           
                "<td>"+item.nombreCorto+"</td>",
                ]
                ).draw(false);
                
            }
        }
    });
}

function eliminarCompetencia(id){
    var eliminarID= id;
    Swal.fire({
        title: 'Realmente desea eliminar la competencia?',
        showDenyButton: true,
        
        confirmButtonText: `Sí, eliminar`,
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "ajax/competencias.ajax.php",
                data: {eliminarID : eliminarID},
                success: function (data) {
                    if(data = "ok"){
                        Swal.fire('Se eliminó correctamente la competencia', '');
                    }
                    actualizar();
                }
            });
            
    }
    })
}

const editarCompetencia = (id)=>{
    var editarID = id
    $.ajax({
        type: "POST",
        url: "ajax/competencias.ajax.php",
        data: {editarID : editarID},
        dataType: "json",
        success: function (data) {
            $("#nombre_competencia").val(data.nombreCompetencia)
            $("#nombre_cortoCompetencia").val(data.nombreCorto)
            $("#identificador_competencia").val(data.identificadorCompetencia)
            botonesEdit()
            ID_Edit = data.idCompetencia
        }
    });

}
const BotonCancelar = ()=>{
    $("#nombre_competencia").val("")
    $("#nombre_cortoCompetencia").val("")
    $("#identificador_competencia").val("")

    $("#btnCompetencia").removeClass("btn-info");
    $("#btnCompetencia").addClass("btn-primary");
    $("#btnCompetencia").val("Registrar");
}

const botonesEdit = ()=>{
    $("#btnCompetencia").removeClass("btn-primary");
    $("#btnCompetencia").addClass("btn-info");
    $("#btnCompetencia").val("Actualizar");
}




