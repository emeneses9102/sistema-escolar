
$('#BuscaApoderado').DataTable();

var tableusuarios;

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#BuscaApoderado').DataTable({
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
$('#BuscaApoderado').on('click', '#Bus_Aporado', function(e) {
	let id=$(this).attr("name");
    var valores = new Array();
    i=0;
    $(".buscID_Apoderado").remove();
    $(this).parents("tr").find("td").each(function(){
       valores[i] =$(this).html();
        i++;
    });
    $("#dni-ap").val(valores[1]);
    $("#nombre-ap").val(valores[2]);
    $("#apellidos-ap").val(valores[3]);
    $("#tipo-ap").val(valores[4]);
    $("#telefono-ap").val(valores[5]);
    $("#telefono-ap").val(valores[6]);
    $("#correo-ap").val(valores[7]);
    $("#ocupacion-ap").val(valores[8]);



    $("#formAlumno").append('<input value="'+id+'" class="buscID_Apoderado" hidden>');
    $("#BuscarApoderado").modal('hide');
         
});
