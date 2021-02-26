$('#matriculaAlumnos').DataTable();

var tableusuarios;

document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#matriculaAlumnos').DataTable({
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

$('#matriculaAlumnos').on('click', '#Mat_Alumno', function(e) {
	let id=$(this).attr("name");
    var valores = new Array();
    i=0;
    $(".matID_Alumno").remove();
    $(this).parents("tr").find("td").each(function(){
       valores[i] =$(this).html();
        i++;
    });
    $("#matricula_nombre").val(valores[2]);
    $("#matricula_apellidos").val(valores[3]); 
    $("#matricula_codAlumno").val(valores[1]);
    var apoderado = (valores[5]=="-")?"Sin apoderado":valores[5];
    $("#matricula_apoderado").val(apoderado);
    $("#matricula_nombre").removeClass("is-invalid");

    $("#form-matricula").append('<input value="'+id+'" class="matID_Alumno" hidden>');
    $("#mBuscarAlumno").modal('hide');
         
});
$("#btnRegistrarMat").click(function (e) { 
    e.preventDefault();
    
    if($("#nivel").val() ==""){
        $("#nivel").addClass("is-invalid");
        return
    }
    if($("#grado").val() ==""){
        $("#grado").addClass("is-invalid");
        return
    }
    if($("#seccion").val() ==""){
        $("#seccion").addClass("is-invalid");
        
    }
    if($("#matricula_nombre").val()==""){
        $("#matricula_nombre").addClass("is-invalid");
        return
    }

    var matCod_Alumno=$("#matricula_codAlumno").val();
    var matID_Alumno=$(".matID_Alumno").val();
    var matidSeccion = seccion.options[seccion.selectedIndex].value;
    var matidNivel = nivel.options[nivel.selectedIndex].value;
    //alert(matCod_Alumno+" "+matID_Alumno+" "+matidSeccion);
    $.ajax({
        url	    : 'ajax/matricula.ajax.php',
        type    : 'POST',
        data    : {matCod_Alumno : matCod_Alumno,
                    matID_Alumno:matID_Alumno,
                    matidSeccion:matidSeccion,
                    matidNivel:matidNivel},
        success: function(data){
            if(data == "ok"){
                swal.fire({
                    icon:"success",
                    title : "Alumno matriculado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                $("#frmMatricula")[0].reset();
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "El alumno no fue matriculado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                $("#frmMatricula")[0].reset();
            }
        }
    })
    

    
});

