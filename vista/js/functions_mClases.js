$('#tableClases').DataTable();
$('#tablaBuscarProfesores').DataTable();
$('#tablaListadoCursos').DataTable();
document.addEventListener('DOMContentLoaded',function(){
    tableusuarios = $('#tablaBuscarProfesores').DataTable({
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
        "iDisplayLength":5,
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
    tableusuarios = $('#tablaListadoCursos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando _TOTAL_ registros",
            "sInfoEmpty":      "Mostrar 0 registros",
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
        "iDisplayLength":5,
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


$('#mostrar').click(function (e) {
    e.preventDefault();

});

/**/
function generarClase(id) {
    var idSeccion_grados = id;
    var codigoClase = $("#codigo_clase").val();
    var nombre_clase = $("#nombre_clase").val();
    $.ajax({
        url: 'ajax/mClases.ajax.php',
        type: 'POST',
        data: {
            idSeccion_grados: idSeccion_grados,
            codigoClase: codigoClase,
            nombre_clase: nombre_clase
        },
        success: function (data) {
            if (data == "ok") {
                swal.fire({
                    icon: "success",
                    title: "Clase creada exitosamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "mClases";
                    }
                })

            } else if (data == "repet") {
                swal.fire({
                    icon: "alert",
                    title: "Ya existe una clase con este código",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })
            }

        }

    });
}

$("#agregarCursom").click(function (e) {
    e.preventDefault();
    idseccion = $("#id_seccion").val();
    $.ajax({
        url: 'ajax/mClases.ajax.php',
        type: 'POST',
        data: { idseccion_: idseccion },
        dataType: "json",
        success: function (data) {
            var html = "";
            $("#CursosFiltro").empty();
            for (let item of data) {
                html += '<tr>' +
                    '<td>' + item.codigo + '</td>' +
                    '<td>' + item.nombre_curso + '</td>' +
                    '<td>' + item.nombre_nivel + '</td>' +
                    '<td>' + item.nombre_grado + '</td>' +
                    '<td>' + item.n_seccion + '</td>' +
                    '<td>' + item.nombre_profesor + '</td>' +
                    '</tr>'
            }
            $("#CursosFiltro").append(html);
        }

    });

});

function editarClase(id) {

    var idClase = id;
    $('#listarClases').removeClass('active');
    $('#listarClases').addClass('fade');

    $('#linkEditar').addClass('active');
    $('#linkEditar').removeClass('disabled');
    $('#listadeClases').removeClass('active');
    $('#editarClase').removeClass('fade');
    $('#editarClase').addClass('active');
    
    $.ajax({
        type: "POST",
        url: "ajax/mClases.ajax.php",
        data: { idClase: idClase },
        dataType: "json",
        success: function (data) {
            $("#idClase").val(data.idClases);
            $("#enombre_clase").val(data.nombre_aula);
            $("#ecodigo_clase").val(data.codigo_clase);
            listarCursos();
            mostrarCursosClase(idClase);
            $("#crusosAgregados").empty();
        }
    });

}

function listarCursos() {
    var ID_dato = "";
    $("#lista_cursosD").empty();
    $.ajax({
        url: 'ajax/mClases.ajax.php',
        type: 'POST',
        data: { ID_dato: ID_dato },
        dataType: "json",
        success: function (data) {
            for (let item of data) {
                //$("#lista_cursosD").append("<tr><td>" + item.codigo_curso + "</td><td>" + item.nombre_curso + "</td><td><button class='btn btn-sm btn-info'  onclick='agregarCursoClase("+item.idCursos+")'><i class='fas fa-plus-circle'></i></button></td></tr>");
                var tabla = $("#tablaListadoCursos").DataTable();
                tabla.row.add(
                    ["<td>" + item.codigo_curso + "</td>",
                    "<td>" + item.nombre_curso + "</td>",
                    "<td><button class='btn btn-sm btn-info'  onclick='agregarCursoClase("+item.idCursos+")'><i class='fas fa-plus-circle'></i></button></td>"
                ]
                ).draw(false);
            }
        }
    });
}

function agregarCursoClase(id){
    var id_Curso=id;
    var id_Clase = $("#idClase").val();
    $.ajax({
        url: 'ajax/mCursos.ajax.php',
        type: 'POST',
        data: { id_Curso: id_Curso,
                id_Clase:id_Clase },
        success: function (data) {
            if(data=="ok"){
                swal.fire({
                    icon:"success",
                    title : "Curso Agregado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then((result) => {
                    if (result.value) {
                        mostrarCursosClase(id_Clase)
                    }
                })
                
            }else{
                swal.fire({
                    icon:"error",
                    title : "El Curso ya existe en la clase",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }

            
        }
    });
}


function eliminarCursoClase(id){
    var id_CursoE=id;
    var id_ClaseE_ = $("#idClase").val();
    $.ajax({
        url: 'ajax/mCursos.ajax.php',
        type: 'POST',
        data: { id_CursoE: id_CursoE,
                id_ClaseE_:id_ClaseE_ },
        success: function (data) {
            if(data=="ok"){
                swal.fire({
                    icon:"success",
                    title : "Curso Eliminado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                });
                        
            }
            mostrarCursosClase(id_ClaseE_)
            
        }
    });
}
function mostrarCursosClase(id){
    $("#crusosAgregados").empty();
    var id_Clasem = id;
    $.ajax({
        url: 'ajax/mCursos.ajax.php',
        type: 'POST',
        data: { id_Clasem:id_Clasem },
        dataType : "json",
        success: function (data) {
            
            for (let item of data) {
                var nombreProfesor = (item.nombres != null)?item.nombres + ' '+item.apellidos:'No asignado'; 
                var nombreCalificacion = (item.nombre != null)?item.nombre:'No asignado'; 
                var escala = (item.escala != null)?item.escala:'No asignado'; 
                var notaAprobatoria = (item.nota_aprobatoria != null)?item.nota_aprobatoria:'No asignado'; 
                $("#crusosAgregados").append(`<div class="col-md-6">
                <div class="tile">
                    <div class="tile-title-w-btn">

                        <h5 class="title">`+item.nombre_curso+`</h5>
                        <div class="btn-group">
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#detallesModal" onclick="enviarID(`+item.idCursos+`,`+item.cod_curso+`)"><i class="fas fa-lightbulb"></i></a>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseMostrar`+item.idCursos+`" role="button" aria-expanded="false" aria-controls="collapseNostrar" id="mostrar"><i class="fa fa-lg fa-plus"></i></a>
                            <a class="btn btn-primary" onclick="eliminarCursoClase(`+item.idCursos+`)" href="#"><i class="fa fa-lg fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="tile-body row collapse" id="collapseMostrar`+item.idCursos+`">
                        <div class="col-md-6 mt-1">
                            <b>Profesor:</b><br>
                            <span class="ml-1">`+nombreProfesor+`</span>
                        </div>
                        <div class="col-md-6 mt-1">
                            <b>Tipo de calificación:</b><br>
                            <span class="ml-1" id="tipo_calificacion">`+nombreCalificacion+`</span>
                        </div>
                        <div class="col-md-6 mt-1">
                            <b>Escala de calificación:</b><br>
                            <span class="ml-1">`+escala+`</span>
                        </div>
                        <div class="col-md-6 mt-1">
                            <b>Nota Mínima aprobatoria:</b><br>
                            <span class="ml-1">`+notaAprobatoria+`</span>
                        </div>
                    </div>
                </div>
            </div>`);

            }
            
        }
    });
}

$('#tablaBuscarProfesores').on('click', '#Agregar_Profesor', function(e) {
	
    var valores = new Array();
    i=0;
     
    $(this).parents("tr").find("td").each(function(){
       valores[i] =$(this).html();
        i++;
    });
    $("#nombreProfesor").val(valores[1]);
    $("#tituloProfesor").val(valores[2]); 
    $("#idProfesor").val(valores[0]);     
})

function enviarID(id,id2){
    $("#idClase_curso_").val(id);
    $("#cod_curso").val(id2);
}
$("#btn_Cerrar").click(function (e) { 
    cerrarModal();  
});

function cerrarModal(){
    $("#nombreProfesor").val("");
    $("#tituloProfesor").val(""); 
    $("#idProfesor").val("");
}

$("#btn_Guardar").click(function (e) { 
    e.preventDefault();
    var id_ClaseE_ = $("#idClase").val();
    $("#detallesModal").modal('hide');
    var idFormato_calif = formato_calificacion.options[formato_calificacion.selectedIndex].value;
    var idProfesor_=$("#idProfesor").val().trim();
    var idCuso_= $("#idClase_curso_").val();
    var cod_curso=$("#cod_curso").val();
    $.ajax({
        url: 'ajax/mClases.ajax.php',
        type: 'POST',
        data: { idFormato_calif : idFormato_calif,
                idProfesor_ :idProfesor_,
                idCuso_ :idCuso_,
                cod_curso:cod_curso},
        success: function (data) {
            if(data=="ok"){
                swal.fire({
                    icon:"success",
                    title : "Detalle de curso agregado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                });
                
            }
            cerrarModal();
            mostrarCursosClase(id_ClaseE_)       
        }
        
    });


});

function mostrarNombreTipo(){
    var id_ClaseE = $("#idClase").val();
    $.ajax({
        url: 'ajax/mCursos.ajax.php',
        type: 'POST',
        data: { id_ClaseE:id_ClaseE },
        dataType : "json",
        success: function (data) {
            
            for (let item of data) {
                var nombreProfesor = item.nombres != ''?item.nombres + ' '+item.apellidos:''; 
                $("#nombreProfesor"+item.idCursos+"").append("<label>"+nombreProfesor+"</label>");
            }
            
        }
    });
}