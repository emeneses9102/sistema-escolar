// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
$('#matriculaAlumnos').DataTable();
$('#matriculaGrupos').DataTable();
var tableusuarios;
var matriculaGrupos;
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

document.addEventListener('DOMContentLoaded',function(){
    matriculaGrupos = $('#matriculaGrupos').DataTable({
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
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            
         }],
        "order": [[1,"asc"]]
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

// Handle click on "Select all" control
$('#example-select-all').on('click', function(){
    // Get all rows with search applied
    
    var rows = matriculaGrupos.rows({ 'search': 'applied' }).nodes();
    // Check/uncheck checkboxes for all rows in the table
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
 });

 // Handle click on checkbox to set state of "Select all" control
 $('#matriculaGrupos tbody').on('change', 'input[type="checkbox"]', function(){
    // If checkbox is not checked
    if(!this.checked){
       var el = $('#example-select-all').get(0);
       // If "Select all" control is checked and has 'indeterminate' property
       if(el && el.checked && ('indeterminate' in el)){
          // Set visual state of "Select all" control 
          // as 'indeterminate'
          el.indeterminate = true;
       }
    }
 });

 $("#btnMatricula").click(function (e) { 
     e.preventDefault();
     var arregloID=[]
     var id_Nivel = nivelG.options[nivelG.selectedIndex].value;
     var id_Seccion = seccionG.options[seccionG.selectedIndex].value;
     if(id_Seccion != "" || id_Seccion != null){
        matriculaGrupos.$('input[type="checkbox"]').each(function(){
            if(this.checked){
               // Create a hidden element 
               //alert($(this).val() +" "+ id_Seccion)
               arregloID.push($(this).val())
            }
         
      });
     }


     $.ajax({
        url		: 'ajax/matricula.ajax.php',
        type	: 'POST',
        data : {GrupoID :JSON.stringify(arregloID),
                id_SeccionG:id_Seccion,
                id_Nivel:id_Nivel},
        success: function (data) {
            if(data == "error"){
                Swal.fire(
                    'Error',
                    'Error al matricular a los alumnos',
                    'error'
                  )
                  $("#claveSeguridad").val("")
            }else{
                Swal.fire(
                    'Exito',
                    'Alumnos matriculados',
                    'success'
                  )
                  window.location = "matricula";
            }
        },
        fail: function(data){
            
            swal('Usuario',data.msg,'error');
        }
    });


     
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

function inicioMatricula(){
    $('#DatosAlumno').hide();
}
inicioMatricula();
function mostrarformAlu(){
    $('#DatosAlumno').show();
    $('#matriculainfo').hide();
}
function closeAlumMatri(){
    $('#DatosAlumno').hide();
    $('#matriculainfo').show();
}